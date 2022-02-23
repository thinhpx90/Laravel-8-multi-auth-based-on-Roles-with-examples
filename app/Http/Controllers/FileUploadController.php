<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\File;
use App\Http\Services\FileUpload\FileUploadService;


class FileUploadController extends Controller
{

    protected $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    public function index()
    {
        return view('dashboards.admins.fileUpload.list-file',[
            'title'=>'Danh sách',
            'files'=>$this->fileUploadService->getAll()
        ]);
    }

    public function createForm(){
        return view('dashboards.admins.fileUpload.file-upload');
    }
    public function fileUpload(Request $req){
        $req->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,docx,doc,png,jpg|max:5120'
        ]);
        $fileModel = new File;
        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->name = time().'_'.$req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();
            return back()
                ->with('success','File has been uploaded.')
                ->with('file', $fileName);
        }
    }
}
