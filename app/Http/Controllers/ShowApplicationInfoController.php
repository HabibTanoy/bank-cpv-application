<?php

namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\Attachment;
use Illuminate\Http\Request;
use App\Workers\FileHandler;

class ShowApplicationInfoController extends Controller
{
    public function showData() {
        $dataInfo = Application::get();
        return view('applicationList', ['info' => $dataInfo]);
    }
    public function updateDataShow($id) {
        $application = Application::with('attachments')
            ->where('id', $id)
            ->first();
        return view('formUpdate', compact('application'));
    }
    public function updated(Request $request, $id) {
        $applicationDataUpdate = Application::where('id', $id)
        ->update([
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
                    'application_id' => $id,
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
                    'application_id' => $id,
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
                    'application_id' => $id,
                    'file_path' => $file_path,
                    'type' => 3
                ]);
            }
        }    
        return redirect()->route('application-list');
    }
    public function delete($id) {
        $application_delete = Application::where('id', $id)
        ->delete();
        Attachment::where('application_id', $id)
        ->delete();
        return redirect()->route('application-list');
    }
    public function fileDelete($id) {
        $application_file_delete = Attachment::where('id', $id)
        ->delete();
        return redirect()->route('application-list');
    }
}
