<?php
namespace app\Workers; 
use Illuminate\Support\Facades\Storage;

class FileHandler{
    protected $root;

    function __construct()
    {
        $this->root = 'storage/'; 
    }
    public function uploadFile($file,$file_name)
    {
        try{
            $file_name = $file_name.'.'.$file->getClientOriginalExtension();
            Storage::put($file_name,$file->getContent());
            return $this->root.$file_name;
        }catch(\Exception $exception){
            dd($exception);
            throw new Exception($exception->getMessage());
        }
    }
}