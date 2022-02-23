<?php


namespace App\Http\Services\FileUpload;

use App\Models\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class FileUploadService
{
    public function getAll()
    {
        return File::orderbyDesc('id')->paginate(20);
    }
}
