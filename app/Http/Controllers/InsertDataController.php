<?php

namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\Attachment;
use App\Models\Type;
use App\Models\GuarantorNid;
use Illuminate\Http\Request;
use App\Workers\FileHandler;
use App\Workers\ApplicationIdGenerator;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Psr7;
use Session;



class InsertDataController extends Controller
{
    public function welcomePage() {
        return view('home');
    }
    public function applicationTypeShow() {
        return view('application_Type');
    }
    public function storeType(Request $request) {
        $store_types = $request->city;
       $data_pass_session = Session::put('request_type', $store_types);
        return redirect()->route('nidfile-show');
    }
    public function showNidFile() {
        return view('nid_fileupload');
    }
    public function storeNid(Request $request) {
        if($request->has('applicant_front_nid')){
            $file_handler = new FileHandler();
            $path = $file_handler->uploadFile($request->file('applicant_front_nid'),'/temp/tmp_nid');
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', 'https://rupantor.barikoi.com/ocr/getn/info', [
                'multipart' => [
                    [
                        'name'     => 'file',
                        'contents' => fopen($path, 'r'),
                    ]
                ]
            ]);
            $response_data = json_decode($response->getBody()->getContents());
            $response_applicant_front_nid_data = $response_data->info;
            
        } else {

        }

        if($request->has('applicant_back_nid')){
            $file_handler = new FileHandler();
            $path = $file_handler->uploadFile($request->file('applicant_back_nid'),'/temp/tmp_nid');
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', 'https://rupantor.barikoi.com/ocr/getnb/info', [
                'multipart' => [
                    [
                        'name'     => 'file',
                        'contents' => fopen($path, 'r'),
                    ]
                ]
            ]);
            $response_data = json_decode($response->getBody()->getContents());
            $response_applicant_back_nid_data = $response_data->info;
            
        } else {

        }
        //guarantor nid data fetch
        if($request->has('guarantor_front_nid')) {
            $file_handler = new FileHandler();
            $path = $file_handler->uploadFile($request->file('guarantor_front_nid'),'/temp/tmp_nid');
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', 'https://rupantor.barikoi.com/ocr/getn/info', [
                'multipart' => [
                    [
                        'name'     => 'file',
                        'contents' => fopen($path, 'r'),
                    ]
                ]
            ]);
            $response_data = json_decode($response->getBody()->getContents());
            $response_guarantor_front_data = $response_data->info;
            return view('form', compact('response_applicant_front_nid_data', 'response_applicant_back_nid_data', 'response_guarantor_front_data'));
        } else {
            return view('form', compact('response_applicant_front_nid_data', 'response_applicant_back_nid_data'));
        }

        if($request->has('guarantor_back_nid')) {
            $file_handler = new FileHandler();
            $path = $file_handler->uploadFile($request->file('guarantor_back_nid'),'/temp/tmp_nid');
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', 'https://rupantor.barikoi.com/ocr/getnb/info', [
                'multipart' => [
                    [
                        'name'     => 'file',
                        'contents' => fopen($path, 'r'),
                    ]
                ]
            ]);
            $response_data = json_decode($response->getBody()->getContents());
            $response_guarantor_back_data = $response_data->info;
            return view('form', compact('response_applicant_front_nid_data', 'response_applicant_back_nid_data', 'response_guarantor_back_data'));
        } else {
            return view('form', compact('response_applicant_front_nid_data', 'response_applicant_back_nid_data', 'response_guarantor_front_data'));
        }
        return view('form', compact('response_applicant_front_nid_data', 'response_applicant_back_nid_data'));
    }
    public function showForm() {
        return view('form');
    }

    public function insertApplicationData(Request $request) {
       //application data store
        $session_data_fetch = Session::get('request_type');
        $file_handler = new FileHandler();
        if($request->hasFile('image_upload')) {           
            $file_name = $request->phone.'_'.rand(10000,99999);
            $image_file_path = $file_handler->uploadFile($request->file('image_upload'),$file_name);       
            $insertData = Application::create([
            'user_id' => rand(1000,9999),
            'name' => $request->name,
            'phone_number' => $request->phone,
            'present_address' => $request->address,
            'nid_address' => $request->nid_address,
            'office_business_name' => $request->officeName,
            'office_business_address' => $request->officeAddress,
            'designation' => $request->designation,
            'nid' => $request->nid,
            'applicant_image' => $image_file_path
        ]);
        $application_id_generator = new ApplicationIdGenerator();
        $application_id = $application_id_generator->ApplicationIdGenerate($insertData->id);
        Application::where('id', $insertData->id)
        ->update([
            'application_id' => $application_id
        ]);

        foreach($session_data_fetch as $type) {
            $insertTypes = Type::create([
                'application_id' => $insertData->id,
                'type' => $type
            ]);
        }
        //for guarantor nid data store
        if($request->hasFile('guarantor_image')) {           
            $file_name = $request->phone.'_'.rand(100,999);
            $guarantor_image_path = $file_handler->uploadFile($request->file('guarantor_image'),$file_name);
            $store_nid = GuarantorNid::create([
                'application_id' => $insertData->id,
                'guarantor_image' => $guarantor_image_path,
                'nid_name' => $request->guarantor_name,
                'nid_no' => '',
                'nid_address' => ''
            ]);
        } else {
            $store_nid = GuarantorNid::create([
                'application_id' => $insertData->id,
                'guarantor_image' => '',
                'nid_name' => $request->guarantor_name,
                'nid_no' => '',
                'nid_address' => ''
            ]);  
        }
        //file upload in db
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
    }   
        return redirect()->route('application-list');   
    }
}
