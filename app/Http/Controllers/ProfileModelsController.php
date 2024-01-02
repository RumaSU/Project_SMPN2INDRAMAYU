<?php

namespace App\Http\Controllers;

use App\Models\ProfileModels;
use App\Models\ProfileMisiModels;
use App\Models\ProfileStrOrgImageModels;
use App\Models\ProfileVisiMisiImageModels;
use App\Models\ProfileStModels;
use App\Models\ClassesModels;
use App\Models\ClassesImagesModels;
use App\Models\ClassesStudentsModels;
use App\Models\StudentsModels;
use App\Models\TeachersModels;
use App\Models\TeachersImagesModels;
use App\Models\TeachersSocmedModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Date;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Ramsey\Uuid\Uuid;

class ProfileModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataVi = ProfileModels::orderBy('created_at', 'desc')->first();
        if($dataVi) {
            $dataMi = ProfileMisiModels::where('page_profile_id', $dataVi->page_profile_id)->get();
            $dataSt = ProfileStModels::where('page_profile_id', $dataVi->page_profile_id)->select('npsn', 'wdth_sch')->latest('created_at')->first();
            $imgViMi = ProfileVisiMisiImageModels::where('page_profile_id', $dataVi->page_profile_id)->select('name_files')->latest('created_at')->first();
            $imgStrOrg = ProfileStrOrgImageModels::where('page_profile_id', $dataVi->page_profile_id)->select('imgleft', 'imgright')->latest('created_at')->first();
            return view("pages.profile.index", compact('dataVi', 'dataMi', 'dataSt','imgViMi','imgStrOrg'));
        }
        return view("pages.profile.index", compact('dataVi'));
    }

    /**
     * Get data from page profile
    */
    public function getDataViMi() {
        $dataVi = ProfileModels::latest('created_at')->first();
        
        if($dataVi) {
            $dataMi = ProfileMisiModels::where('page_profile_id', $dataVi->page_profile_id)->get();
            return response()->json([
                'valVisi' => $dataVi->visi,
                'valMisi' => $dataMi,
            ]);
        }
        return response()->json();
    }
    public function getdatast() {
        $dataSch = ProfileStModels::select('npsn', 'wdth_sch')->latest('created_at')->first();
        return response()->json([
            'dataStSch' => $dataSch,
        ]);
    }
    
     
    public function storeDataSt(Request $request) {
        $validInp = Validator::make([
            'npsnPrflSch' => $request->npsnPrflSch,
            'WdthPrflSch' => $request->WdthPrflSch,
        ], [
            'npsnPrflSch' => 'nullable|numeric|max:9999999999',
            'WdthPrflSch' => 'nullable|numeric|max:99999',
        ]);
        
        if ($validInp) {
            $dataPage = $this->getDataPageProfile();
            $idProfileSt = Uuid::uuid4()->toString();
            $ciNpsn = isset($request->npsnPrflSch) ? $request->npsnPrflSch : 0;
            $ciWdhSc = isset($request->WdthPrflSch) ? $request->WdthPrflSch : 0;
            
            $this->dataBeforeStorePageProfile($idProfileSt, $dataPage);
            $this->dataBeforeStorePageProfileMisi($idProfileSt, $dataPage);
            $this->dataBeforeStorePageProfileViMiImage($idProfileSt, $dataPage);
            $this->dataBeforeStorePageProfileStrcImg($idProfileSt, $dataPage);
            ProfileStModels::create([
                'npsn' => $ciNpsn,
                'wdth_sch' => $ciWdhSc,
                'page_profile_id' => $idProfileSt,
            ]);
            
            return redirect()->back();
        }
    }
    
    /**
     *  Function token
     */
    public function createTokenResetImage(Request $request) {
        $uuidToken = Uuid::uuid4()->toString();
        $tokenForm = $uuidToken . $request->dataAction;
        $md5Hash = md5(rand() . $tokenForm);
        
        $cacheKey = 'resetImg' . $request->dataAction;
        
        // Menyimpan nilai dalam cache sebagai array yang bersarang
        $cachedData = Cache::get('tokenResetImg', []);
        
        $cachedData[$cacheKey] = $md5Hash;
        // Simpan nilai dalam cache
        Cache::put('tokenResetImg', $cachedData, now()->addMinutes(10)); // Simpan selama 60 menit
        return response()->json(['tokenImage' => $md5Hash]);
    }
    
    public function checkToken($keyToken, $requestToken) {
        // Mengambil data dari cache
        $cachedData = Cache::get('tokenResetImg', []);
    
        if (array_key_exists($keyToken, $cachedData)) {
            $savedToken = $cachedData[$keyToken];
    
            // Memeriksa apakah token yang disimpan cocok dengan yang diberikan
            if ($savedToken === $requestToken) {
                // Token cocok, lakukan tindakan yang diinginkan
                return true;
            }
        }
    
        // Jika tidak cocok atau tidak ada dalam cache
        return false;
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function storeVisiMisi(Request $request) {
        $dataPage = $this->getDataPageProfile();
        $validViInp = Validator::make([
            'visiProfil' => $request->visiProfil,
        ], [
            'visiProfil' => 'required|string|max:512',
        ]);
        if($validViInp->passes()) {
            $idProfile = Uuid::uuid4()->toString();
            $isViCreate = false;
            
            $dataVi = ProfileModels::orderBy('created_at', 'desc')->value('visi');
            if($request->visiProfil != $dataVi) {
                ProfileModels::create([
                    'page_profile_id' => $idProfile,
                    'visi' => $request->visiProfil,
                ]);
                $this->dataBeforeStorePageProfileViMiImage($idProfile, $dataPage);
                $this->dataBeforeStorePageProfileStrcImg($idProfile, $dataPage);
                $this->dataBeforeStorePageProfileSt($idProfile, $dataPage);
                
                $isViCreate = true;
            }
            
            $nameMiInput = preg_grep('/^misiProfil_\d+/', array_keys($request->all()));
            if($isViCreate) {
                if($nameMiInput) {
                    foreach ($nameMiInput as $nameInp) {
                        if($request->input($nameInp)) {
                            ProfileMisiModels::create([
                                'misi' => $request->input($nameInp),
                                'page_profile_id' => $idProfile,
                            ]);
                        }
                    }
                } else {
                    ProfileMisiModels::create([
                        'page_profile_id' => $idProfile,
                    ]);
                }
            }
            else {
                $this->dataBeforeStorePageProfile($idProfile, $dataPage);
                foreach ($nameMiInput as $nameInp) {
                    if($request->input($nameInp)) {
                        ProfileMisiModels::create([
                            'misi' => $request->input($nameInp),
                            'page_profile_id' => $idProfile,
                        ]);
                    }
                }
                $this->dataBeforeStorePageProfileViMiImage($idProfile, $dataPage);
                $this->dataBeforeStorePageProfileStrcImg($idProfile, $dataPage);
                $this->dataBeforeStorePageProfileSt($idProfile, $dataPage);
            }
            
            return redirect()->back();
        }
    }
    
    /**
     * Function store image in page
     */
    public function storeImgViMi(Request $request) {
        $validImage = Validator::make([
            '_tokenResetImgViMi' => $request->_tokenResetImgViMi,
            '_filImgViMi' => $request->_filImgViMi,
        ], [
            '_tokenResetImgViMi' => 'nullable|string',
            '_filImgViMi' => 'nullable|image',
        ]);
        
        if($validImage->passes()) {
            $dataPage = $this->getDataPageProfile();
            $idViMiImg = Uuid::uuid4()->toString();
            
            if($request->hasFile('_filImgViMi')) {
                $image = $request->file('_filImgViMi');
                $imageName = time() . '_' . $image->getClientOriginalName(); // Menamai gambar
                $image->storeAs('public/images/pages/profile/'. $imageName);
                
                $this->dataBeforeStorePageProfile($idViMiImg, $dataPage);
                $this->dataBeforeStorePageProfileMisi($idViMiImg, $dataPage);
                ProfileVisiMisiImageModels::create([
                    'name_files' => $imageName,
                    'page_profile_id' => $idViMiImg,
                ]);
                $this->dataBeforeStorePageProfileStrcImg($idViMiImg, $dataPage);
                $this->dataBeforeStorePageProfileSt($idViMiImg, $dataPage);
            }
            if($request->_tokenResetImgViMi) {
                $this->dataBeforeStorePageProfile($idViMiImg, $dataPage);
                $this->dataBeforeStorePageProfileMisi($idViMiImg, $dataPage);
                ProfileVisiMisiImageModels::create([
                    'name_files' => 'default.png',
                    'page_profile_id' => $idViMiImg,
                ]);
                $this->dataBeforeStorePageProfileStrcImg($idViMiImg, $dataPage);
                $this->dataBeforeStorePageProfileSt($idViMiImg, $dataPage);
            }
            
            return redirect()->back();
        } else {
            
        }
    }
    
    
    /**
     * Function store image struct org
     */
    public function storeOrResetImgOrgStrc(Request $request) {
        $validImage = Validator::make([
            '_tokenResetLftImg' => $request->_tokenResetLftImg,
            '_tokenResetRghtImg' => $request->_tokenResetRghtImg,
            '_filLftImg' => $request->_filLftImg,
            '_filRghtImg' => $request->_filRghtImg,
        ], [
            '_tokenResetLftImg' => 'nullable|string',
            '_tokenResetRghtImg' => 'nullable|string',
            '_filLftImg' => 'nullable|image',
            '_filRghtImg' => 'nullable|image',
        ]);
        
        if($validImage->passes()) {
            $dataPage = $this->getDataPageProfile();
            $idProfStrOrg = Uuid::uuid4()->toString();
            $isImgStore = false;
            
            if($request->_filLftImg || $request->_filRghtImg) {
                $this->storePageProfilImgStrgOrg($request, $idProfStrOrg, $dataPage);
                $isImgStore = true;
            }
            if($request->_tokenResetLftImg || $request->_tokenResetRghtImg) {
                $this->resetImgPageProfileStrgOrg($request, $idProfStrOrg, $dataPage, $isImgStore);
            }
            
            return redirect()->back();
        } else {
            
        }
    }
    public function storePageProfilImgStrgOrg($request, $idProfStrOrg, $dataPage) {
        $isLfImgCrt = false;

        if($request->hasFile('_filLftImg')) {
            $image = $request->file('_filLftImg');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Menamai gambar
            $image->storeAs('public/images/pages/profile/'. $imageName);
            
            $this->dataBeforeStorePageProfile($idProfStrOrg, $dataPage);
            $this->dataBeforeStorePageProfileMisi($idProfStrOrg, $dataPage);
            $this->dataBeforeStorePageProfileViMiImage($idProfStrOrg, $dataPage);
            $this->dataBeforeStorePageProfileSt($idProfStrOrg, $dataPage);
            if(isset($dataPage[3])) {
                ProfileStrOrgImageModels::create([
                    'imgleft' => $imageName,
                    'imgright' => $dataPage[3]->imgright,
                    'page_profile_id' => $idProfStrOrg,
                ]);
            } else {
                ProfileStrOrgImageModels::create([
                    'imgleft' => $imageName,
                    'page_profile_id' => $idProfStrOrg,
                ]);
            }
            $isLfImgCrt = true;
        }
        if($request->hasFile('_filRghtImg')) {
            $image = $request->file('_filRghtImg');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Menamai gambar
            $image->storeAs('public/images/pages/profile/'. $imageName);
            
            if($isLfImgCrt) {
                ProfileStrOrgImageModels::where('page_profile_id', $idProfStrOrg)->update([
                    'imgright' => $imageName,
                ]);
            } else {
                $this->dataBeforeStorePageProfile($idProfStrOrg, $dataPage);
                $this->dataBeforeStorePageProfileMisi($idProfStrOrg, $dataPage);
                $this->dataBeforeStorePageProfileViMiImage($idProfStrOrg, $dataPage);
                $this->dataBeforeStorePageProfileSt($idProfStrOrg, $dataPage);
                if(isset($dataPage[3])) {
                    ProfileStrOrgImageModels::create([
                        'imgleft' => $dataPage[3]->imgleft,
                        'imgright' => $imageName,
                        'page_profile_id' => $idProfStrOrg,
                    ]);
                } else {
                    ProfileStrOrgImageModels::create([
                        'imgright' => $imageName,
                        'page_profile_id' => $idProfStrOrg,
                    ]);
                }
                
            }
        }
    }
    public function resetImgPageProfileStrgOrg($request, $idProfStrOrg, $dataPage, $isImgStore) {
        $isLftReq = false;
        if ($request->_tokenResetLftImg) {
            $keyToken = 'resetImg' . 'StrOrg_Img?act=lftImg+29ndf8821sx';
            $requestToken = $request->_tokenResetLftImg;
            $isTokenValid = $this->checkToken($keyToken, $requestToken);
            
            if($isTokenValid) {
                if($isImgStore) {
                    ProfileStrOrgImageModels::where('page_profile_id', $idProfStrOrg)->update([
                        'imgleft' => 'default.png',
                    ]);
                } else {
                    $this->dataBeforeStorePageProfile($idProfStrOrg, $dataPage);
                    $this->dataBeforeStorePageProfileMisi($idProfStrOrg, $dataPage);
                    $this->dataBeforeStorePageProfileViMiImage($idProfStrOrg, $dataPage);
                    $this->dataBeforeStorePageProfileSt($idProfStrOrg, $dataPage);
                    ProfileStrOrgImageModels::create([
                        'imgleft' => 'default.png',
                        'imgright' => $dataPage[3]->imgright,
                        'page_profile_id' => $idProfStrOrg,
                    ]);
                }
                
                $isLftReq = true;
            }
        }
        if ($request->_tokenResetRghtImg) {
            $keyToken = 'resetImg' . 'StrOrg_Img?act=rghtImg+2i8jdfnq82sc';
            $requestToken = $request->_tokenResetRghtImg;
            $isTokenValid = $this->checkToken($keyToken, $requestToken);
            if($isTokenValid) {
                if($isLftReq) {
                    ProfileStrOrgImageModels::where('page_profile_id', $idProfStrOrg)->update([
                        'imgright' => 'default.png',
                    ]);
                } else {
                    if($isImgStore) {
                        ProfileStrOrgImageModels::where('page_profile_id', $idProfStrOrg)->update([
                            'imgright' => 'default.png',
                        ]);
                    } else {
                        $this->dataBeforeStorePageProfile($idProfStrOrg, $dataPage);
                        $this->dataBeforeStorePageProfileMisi($idProfStrOrg, $dataPage);
                        $this->dataBeforeStorePageProfileViMiImage($idProfStrOrg, $dataPage);
                        $this->dataBeforeStorePageProfileSt($idProfStrOrg, $dataPage);
                        ProfileStrOrgImageModels::create([
                            'imgleft' => $dataPage[3]->imgleft,
                            'imgright' => 'default.png',
                            'page_profile_id' => $idProfStrOrg,
                        ]);
                    }
                }
            }
        }
    }
    
    
    /**
     * Store data before
    */
    public function dataBeforeStorePageProfile($idData, $dataPage) {
        if(isset($dataPage[0])) {
            ProfileModels::create([
                'visi' => $dataPage[0]->visi,
                'page_profile_id' => $idData,
            ]);
        } else {
            ProfileModels::create([
                'page_profile_id' => $idData,
            ]);
        }
    }
    public function dataBeforeStorePageProfileMisi($idData, $dataPage) {
        if(isset($dataPage[1])) {
            foreach ($dataPage[1] as $misiInp) {
                ProfileMisiModels::create([
                    'misi' => $misiInp->misi,
                    'page_profile_id' => $idData,
                ]);
            }
        } else {
            ProfileMisiModels::create([
                'page_profile_id' => $idData,
            ]);
        }
    }
    public function dataBeforeStorePageProfileViMiImage($idData, $dataPage) {
        if(isset($dataPage[2])) {
            ProfileVisiMisiImageModels::create([
                'name_files' => $dataPage[2]->name_files,
                'page_profile_id' => $idData,
            ]);
        } else {
            ProfileVisiMisiImageModels::create([
                'page_profile_id' => $idData,
            ]);
        }
    }
    public function dataBeforeStorePageProfileStrcImg($idData, $dataPage) {
        if(isset($dataPage[3])) {
            ProfileStrOrgImageModels::create([
                'imgleft' => $dataPage[3]->imgleft,
                'imgright' => $dataPage[3]->imgright,
                'page_profile_id' => $idData,
            ]);
        } else {
            ProfileStrOrgImageModels::create([
                'page_profile_id' => $idData,
            ]);
        }
    }
    public function dataBeforeStorePageProfileSt($idData, $dataPage) {
        if(isset($dataPage[4])) {
            ProfileStModels::create([
                'npsn' => $dataPage[4]->npsn,
                'wdth_sch' => $dataPage[4]->wdth_sch,
                'page_profile_id' => $idData,
            ]);
        } else {
            ProfileStModels::create([
                'page_profile_id' => $idData,
            ]);
        }
    }
    
    public function getDataPageProfile() {
        $dataPageProfile = ProfileModels::latest('created_at')->first();
        if($dataPageProfile) {
            $dataPageMisi = ProfileMisiModels::where('page_profile_id', $dataPageProfile->page_profile_id)->select('misi')->get();
            $dataPageViMiImage = ProfileVisiMisiImageModels::where('page_profile_id', $dataPageProfile->page_profile_id)->first();
            $dataPageStrctImg = ProfileStrOrgImageModels::where('page_profile_id', $dataPageProfile->page_profile_id)->first();
            $dataPageSt = ProfileStModels::where('page_profile_id', $dataPageProfile->page_profile_id)->first();
            
            $arrDataPage = [
                $dataPageProfile,
                $dataPageMisi,
                $dataPageViMiImage,
                $dataPageStrctImg,
                $dataPageSt,
            ];
            
            return $arrDataPage;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProfileModels $profileModels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfileModels $profileModels)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfileModels $profileModels)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfileModels $profileModels)
    {
        //
    }
}
