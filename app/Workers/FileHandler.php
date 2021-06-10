<?php
namespace app\Workers;
use Illuminate\Support\Facades\Storage;

class FileHandler{
    protected $root;

    function __construct()
    {
        $this->root = 'storage/app/';
    }
    public function uploadFile($file,$file_name)
    {
        try{
            $file_name = $file_name.'.'.$file->getClientOriginalExtension();
            Storage::put($file_name,$file->getContent());
            return storage_path('app').DIRECTORY_SEPARATOR.$file_name;
        }catch(\Exception $exception){
            dd($exception);
            throw new Exception($exception->getMessage());
        }
    }
}
