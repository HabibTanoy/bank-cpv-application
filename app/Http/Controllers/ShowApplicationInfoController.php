<?php

namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\Attachment;
use App\Models\Type;
use App\Models\GuarantorNid;
use Illuminate\Http\Request;
use App\Workers\FileHandler;
use PDF;
use niklasravnsborg\LaravelPdf\Facades\Pdf as mPDF;
use Session;


class ShowApplicationInfoController extends Controller
{
    public function showData() {
        $application_list_data = Application::with('types')->get();
        return view('applicationList', compact('application_list_data'));
    }
    public function formUpdate($id) {
        $application = Application::with('attachments')
            ->where('id', $id)
            ->first();
        $application_type = Application::with('types')
        ->where('id', $id)
        ->first();
        $application_type_data = $application_type->types;
        $types = $this->checkType($application_type_data);
        $application_guarantor = Application::with('guarantors')
        ->where('id', $id)
        ->first();
        $guarantor_data = $application_guarantor->guarantors;
        return view('formUpdate', compact('application', 'types', 'guarantor_data'));
    }
    public function checkType($application_type_data) {
        $new_arr = [0, 0, 0];
        foreach($application_type_data as $types) {
            if($types->type == 1) {
                $new_arr[0] = 1;
            } 
            if($types->type == 2) {
                $new_arr[1] = 1;
            }
            if($types->type == 3) {
                $new_arr[2] = 1;
            }
        }
        return $new_arr;
    }
    public function applicationUpdated(Request $request, $id) {
        $applicationDataUpdate = Application::where('id', $id)
        ->update([
            'name' => $request->name,
            'phone_number' => $request->phone,
            'present_address' => $request->address,
            'office_business_name' => $request->officeName,
            'office_business_address' => $request->officeAddress,
            'designation' => $request->designation,
            'nid' => $request->nid,
        ]);
        foreach($request->city as $types) {
            $insertTypes = Type::where('id', $id)
            ->update([
                'application_id' => $id,
                'type' => $types
            ]);
        }
        //guarantor_data_update
        $guarantor_data_update = GuarantorNid::where('id', $id)
        ->update([
            'nid_name' => $request->guarantor_name,
        ]);
        //attachemnts file
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
    public function applicationDelete($id) {
        $application_delete = Application::where('id', $id)
        ->delete();
        Attachment::where('application_id', $id)
        ->delete();
        Type::where('application_id', $id)
        ->delete();
        GuarantorNid::where('application_id', $id)
        ->delete();
        return redirect()->route('application-list');
    }
    public function fileDelete($id) {
        $application_file_delete = Attachment::where('id', $id)
        ->delete();
        return redirect()->route('application-list');
    }
    public function fileList($id) {
        $application = Application::with('attachments')
            ->where('id', $id)
            ->first();
        return view('filelist', compact('application'));
    }
    public function generatePDF($id) {
        $applicants_data = Application::where('id', $id)
        ->first();
        $guarantors_id = Application::with('guarantors')
        ->where('id', $id)
        ->first();
        $guarantor_data = $guarantors_id->guarantors;
        $pdf = mPDF::loadView('for_pdf', compact('applicants_data', 'guarantor_data'));
    
        return $pdf->download('application.pdf');
    }
    public function download($id) {
        $applicants_data = Application::where('id', $id)
        ->first();
        $guarantors_id = Application::with('guarantors')
        ->where('id', $id)
        ->first();
        $guarantor_data = $guarantors_id->guarantors;
        return view('for_pdf', compact('applicants_data', 'guarantor_data'));
    }
}
