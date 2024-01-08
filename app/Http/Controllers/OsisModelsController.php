<?php

namespace App\Http\Controllers;

use App\Models\OsisModels;
use App\Models\OsisGaleryModels;
use App\Models\OsisHeadBgModels;
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
        $dataPage = OsisModels::latest('created_at')->first();
        if($dataPage) {
            $dataTeGuide = OsisTeguideModels::where('page_osis_id', $dataPage->page_osis_id)->first();
            $dataStat = OsisStatModels::where('page_osis_id', $dataPage->page_osis_id)->first();
            $dataTeGuide = OsisTeguideModels::where('page_osis_teguide.page_osis_id', $dataPage->page_osis_id)
                ->leftJoin('teachers', 'teachers.teacher_id', '=', 'page_osis_teguide.teacher_id')
                ->leftJoin('teachers_images', 'teachers_images.teacher_id', '=', 'teachers.teacher_id')
                ->select('teachers.name', 'teachers_images.name_files', 'page_osis_teguide.quote')
                ->first();
            // $imgStrOrg = OsisModels::where('page_osis_id', $dataPage->page_osis_id)->first();
            $countOsisMember = OsisMemberModels::count('student_id');
            // $countArr = [
            //     'cntClass' => $countClass,
            //     'cntTeacher' => $countTeachers,
            // ];
            return view("pages.osis.index", compact(
                'dataPage',
                'dataTeGuide',
                'dataStat',
                'countOsisMember',
            ));
        }
        return view("pages.osis.index");
    }

    /**
     *  Function data json
     */
    public function getListTeacher() {
        $dataPage = $this->getDataPageProfile();
        $teacherChoosed = NULL;
        $listTeacher = NULL;
        $quoteTeGuide = '';
        
        if($dataPage[3]) {
            $teacherChoosed = TeachersModels::where('teachers.is_published', true)
            ->where('teachers.status', '=', 'Aktif')
            ->where('teachers.teacher_id', '=', $dataPage[3]->teacher_id)
            ->leftJoin('teachers_images', 'teachers.teacher_id', '=', 'teachers_images.teacher_id')
            ->select(
                'teachers.teacher_id',
                'teachers.name',
                'teachers_images.name_files')
            ->first();
            $quoteTeGuide = $dataPage[3]->quote;
        }
        $listTeacher = TeachersModels::where('teachers.is_published', true)
            ->where('teachers.status', '=', 'Aktif')
            ->where('teachers.teacher_id', '!=', $teacherChoosed->teacher_id)
            ->leftJoin('teachers_images', 'teachers.teacher_id', '=', 'teachers_images.teacher_id')
            ->select(
                'teachers.teacher_id',
                'teachers.name',
                'teachers_images.name_files')
            ->get();
        return response()->json([
            'quote' => $quoteTeGuide,
            'teacherChoosed' => $teacherChoosed,
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
     *  Function list to store
     */
    public function getListTeacherIn() {
        $listTeacher = TeachersModels::where('is_published', true)
            ->where('status', '=', 'Aktif')
            ->select(
                'teachers.teacher_id',
            )
            ->get();
        return $listTeacher;
    }
    
    
    /**
     * Store a newly created resource in storage.
     */
    
    public function storeDescOsisLogo(Request $request) {
        $dataPage = $this->getDataPageProfile();
        $dataValInp = Validator::make([
            'lgoBallImg' => $request->lgoBallImg,
            'inpTxtDescOsis' => $request->inpTxtDescOsis,
        ], [
            'lgoBallImg' => 'nullable|image',
            'inpTxtDescOsis' => 'nullable|string|max:1024',
        ]);
        if($dataValInp->passes()) {

            $idOsis = Uuid::uuid4()->toString();
            $isNewCreate = false;
            
            $dataPageDesc = OsisModels::latest('created_at')->value('page_description');
            if($request->inpTxtDescOsis != $dataPageDesc) {
                OsisModels::create([
                    'page_osis_id' => $idOsis,
                    'page_description' => $request->inpTxtDescOsis,
                ]);
                $this->dataBeforeStorePageOsisHeadBg($idOsis, $dataPage);
                $this->dataBeforeStorePageOsisStat($idOsis, $dataPage);
                $this->dataBeforeStorePageOsisTeguide($idOsis, $dataPage);
                
                $isNewCreate = true;
            }
            
            if($request->hasFile('lgoBallImg')) {
                $image = $request->file('lgoBallImg');
                $imageName = time() . '_' . $image->getClientOriginalName(); // Menamai gambar
                
                if($isNewCreate) {
                    OsisModels::where('page_osis_id', $idOsis)->update([
                        'page_logo' => $imageName,
                    ]);
                    $image->storeAs('public/images/pages/osis/'. $imageName);
                } else {
                    OsisModels::create([
                        'page_osis_id' => $idOsis,
                        'page_logo' => $imageName,
                        'page_description' => $dataPage[0]->page_description,
                    ]);
                    $image->storeAs('public/images/pages/osis/'. $imageName);
                    
                    $this->dataBeforeStorePageOsisHeadBg($idOsis, $dataPage);
                    $this->dataBeforeStorePageOsisStat($idOsis, $dataPage);
                    $this->dataBeforeStorePageOsisTeguide($idOsis, $dataPage);
                }
            } else {
                if($isNewCreate) {
                    OsisModels::where('page_osis_id', $idOsis)->update([
                        'page_logo' => $dataPage[0]->page_logo,
                    ]);
                } else {
                    OsisModels::create([
                        'page_osis_id' => $idOsis,
                        'page_logo' => $dataPage[0]->page_logo,
                        'page_description' => $dataPage[0]->page_description,
                    ]);
                    
                    $this->dataBeforeStorePageOsisHeadBg($idOsis, $dataPage);
                    $this->dataBeforeStorePageOsisStat($idOsis, $dataPage);
                    $this->dataBeforeStorePageOsisTeguide($idOsis, $dataPage);
                }
            }
            
        }
        
        return redirect()->back();
    }
    public function storeTeGuideOsis(Request $request) {
        $dataPage = $this->getDataPageProfile();
        $listTeacherIn = $this->getListTeacherIn()->pluck('teacher_id')->toArray();
        $dataValInp = Validator::make([
            'teacherChoose' => $request->teacherChoose,
            'txtInpQtTe' => $request->txtInpQtTe,
        ], [
            'teacherChoose' => ['nullable', Rule::in($listTeacherIn)],
            'txtInpQtTe' => 'nullable|string|max:512',
        ]);
        if ($dataValInp->passes()) {
            $idOsis = Uuid::uuid4()->toString();
            $teacherId = NULL;
            
            if (isset($dataPage[3]->teacher_id)) {
                $teacherId = $dataPage[3]->teacher_id;
            }
            if (isset($request->teacherChoose)) {
                $teacherId = $request->teacherChoose;
            }
            
            $this->dataBeforeStorePageOsis($idOsis, $dataPage);
            $this->dataBeforeStorePageOsisHeadBg($idOsis, $dataPage);
            $this->dataBeforeStorePageOsisStat($idOsis, $dataPage);
            
            OsisTeguideModels::create([
                'page_osis_id' => $idOsis,
                'teacher_id' => $teacherId,
            ]);
            
            if(isset($request->txtInpQtTe)) {
                OsisTeguideModels::where('page_osis_id', $idOsis)->update([
                    'quote' => $request->txtInpQtTe,
                ]);
            } else {
                OsisTeguideModels::where('page_osis_id', $idOsis)->update([
                    'quote' => $dataPage[3]->quote,
                ]);
            }
        }
        return redirect()->back();
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
    

    public function dataBeforeStorePageOsis($idData, $dataPage) {
        if(isset($dataPage[0])) {
            OsisModels::create([
                'page_osis_id' => $idData,
                'page_logo' => $dataPage[0]->page_logo,
                'page_description' => $dataPage[0]->page_description,
                'page_strct_img' => $dataPage[0]->page_strct_img,
            ]);
        } else {
            OsisModels::create([
                'page_osis_id' => $idData,
            ]);
        }
    }
    public function dataBeforeStorePageOsisHeadBg($idData, $dataPage) {
        if(isset($dataPage[1])) {
            OsisHeadBgModels::create([
                'page_osis_id' => $idData,
                'page_head_img' => $dataPage[1]->page_head_img,
            ]);
        } else {
            OsisHeadBgModels::create([
                'page_osis_id' => $idData,
            ]);
        }
    }
    public function dataBeforeStorePageOsisStat($idData, $dataPage) {
        if(isset($dataPage[2])) {
            OsisStatModels::create([
                'page_osis_id' => $idData,
                'osis_leader_id' => $dataPage[2]->osis_leader_id,
                'facebook' => $dataPage[2]->facebook,
                'instagram' => $dataPage[2]->instagram,
                'twitter' => $dataPage[2]->twitter,
                'tiktok' => $dataPage[2]->tiktok,
                'youtube' => $dataPage[2]->youtube,
            ]);
        } else {
            OsisStatModels::create([
                'page_osis_id' => $idData,
            ]);
        }
    }
    public function dataBeforeStorePageOsisTeguide($idData, $dataPage) {
        if(isset($dataPage[3])) {
            OsisTeguideModels::create([
                'page_osis_id' => $idData,
                'teacher_id' => $dataPage[3]->teacher_id,
                'quote' => $dataPage[3]->quote,
            ]);
        } else {
            OsisTeguideModels::create([
                'page_osis_id' => $idData,
            ]);
        }
    }
    // public function dataBeforeStorePageProfileSt($idData, $dataPage) {
    //     if(isset($dataPage[4])) {
    //         ProfileStModels::create([
    //             'npsn' => $dataPage[4]->npsn,
    //             'wdth_sch' => $dataPage[4]->wdth_sch,
    //             'page_osis_id' => $idData,
    //         ]);
    //     } else {
    //         ProfileStModels::create([
    //             'page_osis_id' => $idData,
    //         ]);
    //     }
    // }
    
    public function getDataPageProfile() {
        $dataPageOsis = OsisModels::latest('created_at')->first();
        if($dataPageOsis) {
            $dataPageHeadBg = OsisHeadBgModels::where('page_osis_id', $dataPageOsis->page_osis_id)->first();
            $dataPageOsisStat = OsisStatModels::where('page_osis_id', $dataPageOsis->page_osis_id)->first();
            $dataPageTeGuide = OsisTeguideModels::where('page_osis_id', $dataPageOsis->page_osis_id)->first();
            
            $arrDataPage = [
                $dataPageOsis,
                $dataPageHeadBg,
                $dataPageOsisStat,
                $dataPageTeGuide,
            ];
            
            return $arrDataPage;
        }
    }
    
    public function ajxPageOsisLgDesc() {
        $dataPage = OsisModels::latest('created_at')->select('page_logo', 'page_description')->first();
        $isHaveLogo = (isset($dataPage->page_logo)) ? '/storage/images/pages/osis/' . $dataPage->page_logo : '/assets/img/icon/camera.png';
        $isHaveDescription = (isset($dataPage->page_description)) ? $dataPage->page_description : '';
        
        return response()->json([
            'logo' => $isHaveLogo,
            'description' => $isHaveDescription,
        ]);
    }
    
    public function osisStudentChooseForm() {

        return view('pages.osis.containerOsisStudent');
    }
    public function osisStudentChooseContent() {
        return view('pages.osis.itemStudent');
    }
}
