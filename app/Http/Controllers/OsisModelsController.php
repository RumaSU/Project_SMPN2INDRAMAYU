<?php

namespace App\Http\Controllers;

use App\Models\OsisModels;
use App\Models\OsisGaleryModels;
use App\Models\OsisMemberModels;
use App\Models\OsisStatModels;
use App\Models\OsisTeguideModels;
use App\Models\StudentsModelst;
use App\Models\StudentsImagesModels;
use App\Models\StudentsModels;
use App\Models\TeachersModels;
use App\Models\TeachersImagesModels;
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

class OsisModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("pages.osis.index");
    }
    
    public function getListTeacher() {
        $listTeacher = TeachersModels::where('teachers.is_published', true)
            ->where('status', '=', 'Aktif')
            ->where('is_published', '=', true)
            ->leftJoin('teachers_images', 'teachers.teacher_id', '=', 'teachers_images.teacher_id')
            ->select(
                'teachers.teacher_id',
                'teachers.name',
                'teachers_images.name_files')
            ->get();
        return response()->json([
            'listTeacher' => $listTeacher,
        ]);
    }
    public function getListStudent() {
        $listTeacher = StudentsModels::where('students.is_published', true)
            ->where('status', '=', 'Aktif')
            ->where('is_published', '=', true)
            ->leftJoin('students_images', 'students.student_id', '=', 'students_images.student_id')
            ->select(
                'students.student_id',
                'students.name',
                'students_images.name_files')
            ->get();
        return response()->json([
            'listLeStudent' => $listTeacher,
            'listMemStudent' => $listTeacher,
        ]);
    }
    
    public function getDataTeacher(Request $request) {
        $valId = Validator::make([
            'tcId' => $request->tcId
        ], [
            'tcId' => 'string'
        ]);
        if($valId->passes()) {
            $dataTeacher = TeachersModels::where('teachers.teacher_id', $request->tcId)
                ->leftJoin('teachers_images', 'teachers.teacher_id', '=', 'teachers_images.teacher_id')
                ->select(
                    'teachers.teacher_id',
                    'teachers.name',
                    'teachers.nip',
                    'teachers_images.name_files',
                )
                ->first();
            if(isset($dataTeacher)){
                return response()->json([
                    'dataTeacher' => $dataTeacher,
                ]);
            } else {
                return response()->json('Nothing found');
            }
        }
    }
    
    public function searchTeacher(Request $request) {
        $searchInput = $request->searchInput;
        $results = TeachersModels::where('teachers.name', 'like', '%' . $searchInput . '%')
            ->where('status', '=', 'Aktif')
            ->where('is_published', '=', true)
            ->leftJoin('teachers_images', 'teachers.teacher_id', '=', 'teachers_images.teacher_id')
            ->select(
                'teachers.teacher_id',
                'teachers.name',
                'teachers_images.name_files')
            ->get();

        return response()->json($results);
    }

    
    /**
     * Store a newly created resource in storage.
     */
    
    public function storeDescOsisLogo(Request $request) {
        $dataPage = $this->getDataPageProfile();
        $validViInp = Validator::make([
            'lgoBallImg' => $request->lgoBallImg,
            'inpTxtDescOsis' => $request->inpTxtDescOsis,
        ], [
            'lgoBallImg' => 'nullable|image',
            'inpTxtDescOsis' => 'nullable|string|max:512',
        ]);
        if($validViInp->passes()) {
            $idProfile = Uuid::uuid4()->toString();
            $isViCreate = false;
            
            $dataVi = OsisModels::latest('created_at')->value('page_description');
            if($request->inpTxtDescOsis != $dataVi) {
                OsisModels::create([
                    'page_osis_id' => $idProfile,
                    'page_description' => $request->inpTxtDescOsis,
                ]);
                $this->dataBeforeStorePageProfileViMiImage($idProfile, $dataPage);
                $this->dataBeforeStorePageProfileStrcImg($idProfile, $dataPage);
                $this->dataBeforeStorePageProfileSt($idProfile, $dataPage);
                
                $isViCreate = true;
            }
            
            if($request->hasFile('inpTxtDescOsis')) {
                if($isViCreate) {
                    OsisModels::where('page_profile_id', $idProfile)->update([
                        'page_logo' => $request->inpTxtDescOsis,
                    ]);
                } else {
                    OsisModels::create([
                        'page_osis_id' => $idProfile,
                        'page_description' => $request->inpTxtDescOsis,
                    ]);
                }
            }
            if($isViCreate) {
                OsisModels::where('page_profile_id', $idProfile)->update([
                    'page_logo' => $request->inpTxtDescOsis,
                ]);
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
    /*

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
    /*

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
    /*

    public function dataBeforeStorePageProfile($idData, $dataPage) {
        if(isset($dataPage[0])) {
            OsisModels::create([
                'visi' => $dataPage[0]->visi,
                'page_profile_id' => $idData,
            ]);
        } else {
            OsisModels::create([
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
        $dataPageProfile = OsisModels::latest('created_at')->first();
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
    */
}
