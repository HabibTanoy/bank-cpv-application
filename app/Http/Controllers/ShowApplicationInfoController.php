<?php

namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\Attachment;
use App\Models\Type;
use App\Models\GuarantorNid;
use App\Models\CoApplicant;
use App\Models\SecondGuarantor;
use Illuminate\Http\Request;
use App\Workers\FileHandler;
use PDF;
use niklasravnsborg\LaravelPdf\Facades\Pdf as mPDF;
use Session;


class ShowApplicationInfoController extends Controller
{
    public function showData() {
        $application_list_data = Application::with('types')->get();
        return view('admin.application.list', compact('application_list_data'));
    }
    public function formUpdate($id) {
        $application = Application::with('attachments')
            ->where('id', $id)
            ->first();
        $application_type = Application::with('types')
        ->where('id', $id)
        ->first();
        $co_applicant_information = CoApplicant::where('application_id', $id)
        ->first();
        $application_type_data = $application_type->types;
        $types = $this->checkType($application_type_data);
        $application_guarantor = Application::with('guarantors')
        ->where('id', $id)
        ->first();
        $second_guarantor = SecondGuarantor::where('application_id', $id)
        ->first();
        $guarantor_data = $application_guarantor->guarantors;
        return view('admin.application.form_update', compact('application', 'types', 'guarantor_data', 'co_applicant_information', 'second_guarantor'));
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

    private function updateApplicant(Request $request, $id, FileHandler $file_handler)
    {
        $application_update_data = [
            'name' => $request->name,
            'phone_number' => $request->phone,
            'present_address' => $request->address,
            'office_business_name' => $request->officeName,
            'office_business_address' => $request->officeAddress,
            'designation' => $request->designation,
            'nid' => $request->nid
        ];
        
        if($request->hasFile('applicant_image')) { 
            $file_name = $request->phone.'_'.rand(1000,9999);
            $image_file_path = $file_handler->uploadFile($request->file('applicant_image'),$file_name);
            $application_update_data['applicant_image'] = $image_file_path;
        }
        Application::where('id', $id)
            ->update($application_update_data);
    }

    private function updateCoApplicant(Request $request, $id, FileHandler $file_handler)
    {
        $co_applicant_update = [
            'name' => $request->co_applicant_name,
            'phone_number' => $request->co_applicant_phone,
            'present_address' => $request->co_applicant_address,
            'office_business_name' => $request->co_applicant_officeName,
            'office_business_address' => $request->co_applicant_officeAddress,
            'designation' => $request->co_applicant_designation,
            'nid_number' => $request->co_applicant_nid,
        ];

        if($request->hasFile('co_applicant_image')) { 
            $file_name = $request->phone.'_'.rand(1000,9999);
            $image_file_path = $file_handler->uploadFile($request->file('co_applicant_image'),$file_name);
            $application_update_data['co_applicant_image'] = $image_file_path;
        }
        CoApplicant::where('application_id', $id)
            ->update($co_applicant_update);
    }

    private function updateGuarantor(Request $request, $id, FileHandler $file_handler)
    {
        $guarantor_data_update = [
            'name' => $request->guarantor_name,
            'phone_number' => $request->guarantor_phone,
            'present_address' => $request->guarantor_address,
            'office_business_name' => $request->guarantor_officeName,
            'office_business_address' => $request->guarantor_officeAddress,
            'designation' => $request->guarantor_designation,
            'nid' => $request->guarantor_nid,
        ];

        if($request->hasFile('guarantor_image')) { 
            $file_name = $request->phone.'_'.rand(1000,9999);
            $image_file_path = $file_handler->uploadFile($request->file('guarantor_image'),$file_name);
            $application_update_data['guarantor_image'] = $image_file_path;
        }
        GuarantorNid::where('application_id', $id)
            ->update($guarantor_data_update);
    }

    private function updateSecondGuarantor(Request $request, $id, FileHandler $file_handler)
    {
        $second_guarantor_update = [
            'application_id' => $id,
            'name' => $request->second_guarantor_name,
            'phone_number' => $request->second_guarantor_phone,
            'present_address' => $request->second_guarantor_address,
            'office_business_name' => $request->second_guarantor_officeName,
            'office_business_address' => $request->second_guarantor_officeAddress,
            'designation' => $request->second_guarantor_designation,
            'nid_number' => $request->second_guarantor_nid
        ];

        if($request->hasFile('second_guarantor_image')) { 
            $file_name = $request->phone.'_'.rand(1000,9999);
            $image_file_path = $file_handler->uploadFile($request->file('second_guarantor_image'),$file_name);
            $application_update_data['second_guarantor_image'] = $image_file_path;
        }

        SecondGuarantor::where('application_id', $id)
            ->update($second_guarantor_update);
    }

    public function applicationUpdated(Request $request, $id) {
        $this->validate($request, [
            'name' => 'max:255',
            'phone' => 'regex:/\+?(88)?01[3456789][0-9]{8}\b/',
            'address' => 'max:255',
            'officeName' => 'max:255',
            'officeAddress' => 'max:255',
            'designation' => 'max:255',
            'nid' => 'numeric',
            'loi_files' => 'max:10000',
            'bank_withdrawal_files' => 'max:10000',
            'rental_deed_files' => 'max:10000',
            'applicant_image' => 'image',
            'co_applicant_name' => 'max:255',
            'co_applicant_phone' => 'nullable|regex:/\+?(88)?01[3456789][0-9]{8}\b/',
            'co_applicant_address' => 'max:255',
            'co_applicant_nid_address' => 'max:255',
            'co_applicant_officeName' => 'max:255',
            'co_applicant_officeAddress' => 'max:255',
            'co_applicant_designation' => 'max:255',
            'co_applicant_nid' => 'nullable',
            'co_applicant_image' => 'nullable|image',
            'guarantor_name' => 'max:255',
            'guarantor_phone' => 'nullable|regex:/\+?(88)?01[3456789][0-9]{8}\b/',
            'guarantor_address' => 'max:255',
            'nid_address' => 'max:255',
            'guarantor_officeName' => 'max:255',
            'guarantor_officeAddress' => 'max:255',
            'guarantor_designation' => 'max:255',
            'guarantor_nid' => 'nullable',
            'guarantor_image' => 'nullable|image',
            'second_guarantor_name' => 'max:255',
            'second_guarantor_phone' => 'nullable|regex:/\+?(88)?01[3456789][0-9]{8}\b/',
            'second_guarantor_address' => 'max:255',
            'second_nid_address' => 'max:255',
            'second_guarantor_officeName' => 'max:255',
            'second_guarantor_officeAddress' => 'max:255',
            'second_guarantor_designation' => 'max:255',
            'second_guarantor_nid' => 'nullable',
            'second_guarantor_image' => 'nullable|image',
        ]);
        
        $file_handler = new FileHandler();

        $this->updateApplicant($request, $id, $file_handler);
        
        $application = Application::find($id);
        $application->types()->delete();
        
        foreach($request->city as $type) {
            $insertTypes = Type::create([
                'application_id' => $id,
                'type' => $type
            ]);
        }

        //co-applicant update
        $this->updateCoApplicant($request, $id, $file_handler);
        //guarantor_data_update
        $this->updateGuarantor($request, $id, $file_handler);
        //2nd guarantor update
        $this->updateSecondGuarantor($request, $id, $file_handler);
        //attachemnts file
        $file_handler = new FileHandler();

        if ($request->hasFile('loi_files')) {
            foreach($request->file('loi_files') as $file)
            {
                $file_name = $request->phone.'_'.rand(10000,99999);
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
                $file_name = $request->phone.'_'.rand(10000,99999);
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
                $file_name = $request->phone.'_'.rand(10000,99999);
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
    public function applicationView($id) {
        $applicant_data = Application::with('types')
        ->where('id', $id)
        ->first();
        $applicant_attachement = Application::with('attachments')
        ->where('id', $id)
        ->first();
        $co_applicant_information = CoApplicant::where('application_id', $id)
        ->first();
        $app_attach = $applicant_attachement->attachments;
        $guarantor_data = GuarantorNid::where('application_id', $id)
        ->first();
        $second_guarantor = SecondGuarantor::where('application_id', $id)
        ->first();
        $for_types = $applicant_data->types;
        return view('admin.application.application_view', compact('applicant_data', 'guarantor_data', 'for_types', 'app_attach', 'co_applicant_information', 'second_guarantor'));
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
        return redirect()->back();
    }
    public function fileList($id) {
        $application_files = Application::with('attachments')
            ->where('id', $id)
            ->first();
        return view('admin.application.file_list', compact('application_files'));
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
