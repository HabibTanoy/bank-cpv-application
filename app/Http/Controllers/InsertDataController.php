<?php

namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\Attachment;
use Illuminate\Http\Request;
use App\Workers\FileHandler;

class InsertDataController extends Controller
{
    public function showForm() {
        return view('form');
    }

    public function insertForm(Request $request) {
        // dd($request->all(), $request->hasFile('loi_files'));
        $insertData = Application::create([
            'name' => $request->name,
            'phone_number' => $request->phone,
            'present_address' => $request->address,
            'office_business_name' => $request->officeName,
            'office_business_address' => $request->officeAddress,
            'designation' => $request->designation,
            'nid' => $request->nid,
            'type' => $request->city
        ]);
        $file_handler = new FileHandler();

        if ($request->hasFile('loi_files')) {
            foreach($request->file('loi_files') as $file)
            {
                $file_name = $request->nid.'_'.rand(10000,99999);
                $file_path = $file_handler->uploadFile($file,$file_name);
                Attachment::create([
                    'application_id' => $insertData->id,
                    'file_path' => $file_path,
                    'type' => 1
                ]);
            }
        }

        if ($request->hasFile('bank_withdrawal_files')) {
            foreach($request->file('bank_withdrawal_files') as $file)
            {
                $file_name = $request->nid.'_'.rand(10000,99999);
                $file_path = $file_handler->uploadFile($file,$file_name);
                Attachment::create([
                    'application_id' => $insertData->id,
                    'file_path' => $file_path,
                    'type' => 2
                ]);
            }
        }
        if ($request->hasFile('rental_deed_files')) {
            foreach($request->file('rental_deed_files') as $file)
            {
                $file_name = $request->nid.'_'.rand(10000,99999);
                $file_path = $file_handler->uploadFile($file,$file_name);
                Attachment::create([
                    'application_id' => $insertData->id,
                    'file_path' => $file_path,
                    'type' => 3
                ]);
            }
        }    
        return redirect()->route('application-list');   
    }
}
