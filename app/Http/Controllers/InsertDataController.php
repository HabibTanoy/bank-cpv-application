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
use App\Workers\ApplicationIdGenerator;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Psr7;
use Session;
use Auth;
use GuzzleHttp\Exception\ConnectException;



class InsertDataController extends Controller
{
    public function welcomePage() {
        return view('admin.application.home');
    }

    public function applicationTypeShow() {
        return view('admin.application.application_type');
    }

    public function storeType(Request $request) {
        $store_types = $request->city;
       $data_pass_session = Session::put('request_type', $store_types);
        return redirect()->route('nidfile-show');
    }
    public function showNidFile() {
        return view('admin.application.nid_fileupload');
    }

    public function storeNid(Request $request) {
        $this->validate($request, [
            'applicant_front_nid' => 'required|mimes:jpg,png',
            'applicant_back_nid' => 'required|mimes:jpg,png',
            'co_applicant_front_nid' => 'mimes:jpg,png',
            'co_applicant_back_nid' => 'mimes:jpg,png',
            'guarantor_front_nid' => 'mimes:jpg,png',
            'guarantor_back_nid' => 'mimes:jpg,png',
            'second_guarantor_front_nid' => 'mimes:jpg,png',
            'second_guarantor_back_nid' => 'mimes:jpg,png'
        ], [
            'applicant_front_nid.required' => "Applicated Front NID Needed",
            "applicant_back_nid.image" => "IMAGE Needed"
        ]);

        $response_applicant_front_nid_data = $this->uploadFileAndFindInfoFromRupantor(
            $request->file('applicant_front_nid'),
            config('url.rupantor_api_for_nid_front_ocr')
        );

        $response_applicant_back_nid_data = $this->uploadFileAndFindInfoFromRupantor(
            $request->file('applicant_back_nid'),
            config('url.rupantor_api_for_nid_back_ocr')
        );

        // dd($response_applicant_back_nid_data,
        // is_array($response_applicant_back_nid_data) 
        // && is_string($response_applicant_back_nid_data["error"]));

        if (
            is_array($response_applicant_front_nid_data) 
            && is_string($response_applicant_front_nid_data["error"])
        ) {
            return redirect()->back()->with([
                'rupantor_error' => $response_applicant_front_nid_data["error"]
            ]);
        }

        if (
            is_array($response_applicant_back_nid_data) 
            && is_string($response_applicant_back_nid_data["error"])
        ) {
            return redirect()->back()->with([
                'rupantor_error' => $response_applicant_back_nid_data["error"]
            ]);
        }

        if($request->hasFile('co_applicant_front_nid')) {
            $response_co_applicant_front_nid_data = $this->uploadFileAndFindInfoFromRupantor(
                $request->file('co_applicant_front_nid'),
                config('url.rupantor_api_for_nid_front_ocr')
            );
        } else {
            $response_co_applicant_front_nid_data = null;
        }

        if($request->hasFile('co_applicant_back_nid')) {
            $response_co_applicant_back_nid_data = $this->uploadFileAndFindInfoFromRupantor(
                $request->file('co_applicant_back_nid'),
                config('url.rupantor_api_for_nid_back_ocr')
            );
        } else {
            $response_co_applicant_back_nid_data = null;
        }

        if($request->hasFile('guarantor_front_nid')) {
            $response_guarantor_front_data = $this->uploadFileAndFindInfoFromRupantor(
                $request->file('guarantor_front_nid'), 
                config('url.rupantor_api_for_nid_front_ocr')
            );
        } else {
            $response_guarantor_front_data = null;
        }

        if ($request->hasFile('guarantor_back_nid')) {
            $response_guarantor_back_data = $this->uploadFileAndFindInfoFromRupantor(
                $request->file('guarantor_back_nid'), 
                config('url.rupantor_api_for_nid_back_ocr')
            );
        } else {
            $response_guarantor_back_data = null;
        }

        if($request->hasFile('second_guarantor_front_nid')) {
            $response_second_guarantor_front_data = $this->uploadFileAndFindInfoFromRupantor(
                $request->file('second_guarantor_front_nid'),
                config('url.rupantor_api_for_nid_front_ocr')
            );
        } else {
            $response_second_guarantor_front_data = null;
        }

        if($request->hasFile('second_guarantor_back_nid')) {
            $response_second_guarantor_back_data = $this->uploadFileAndFindInfoFromRupantor(
                $request->file('second_guarantor_back_nid'),
                config('url.rupantor_api_for_nid_back_ocr')
            );
        } else {
            $response_second_guarantor_back_data = null;
        }

        // dd($response_applicant_front_nid_data, 
        //     $response_applicant_back_nid_data,
        //     $response_co_applicant_front_nid_data,
        //     $response_co_applicant_back_nid_data,
        //     $response_guarantor_front_data,
        //     $response_guarantor_back_data,
        //     $response_second_guarantor_front_data,
        //     $response_second_guarantor_back_data
        // );

        return redirect()->route('application-form', [
            'response_applicant_front_nid_data' => $response_applicant_front_nid_data,
            'response_applicant_back_nid_data' => $response_applicant_back_nid_data,
            'response_co_applicant_front_nid_data' => $response_co_applicant_front_nid_data,
            'response_co_applicant_back_nid_data' => $response_co_applicant_back_nid_data,
            'response_guarantor_front_data' => $response_guarantor_front_data,
            'response_guarantor_back_data' => $response_guarantor_back_data,
            'response_second_guarantor_front_data' => $response_second_guarantor_front_data,
            'response_second_guarantor_back_data' => $response_second_guarantor_back_data
        ]);
        return view('admin.application.create', compact(
                'response_applicant_front_nid_data',
                'response_applicant_back_nid_data',
                'response_co_applicant_front_nid_data',
                'response_co_applicant_back_nid_data',
                'response_guarantor_front_data',
                'response_guarantor_back_data',
                'response_second_guarantor_front_data',
                'response_second_guarantor_back_data'
            )
        );
    }

    private function uploadFileAndFindInfoFromRupantor($file, $rupantor_api_endpoint)
    {
        try {
            $file_handler = new FileHandler();
            $path = $file_handler->uploadFile($file, '/temp/tmp_nid');

            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', $rupantor_api_endpoint, [
                'multipart' => [
                    [
                        'name'     => 'file',
                        'contents' => fopen($path, 'r'),
                    ]
                ]
            ]);
            return json_decode($response->getBody()->getContents());
        } catch (ConnectException $exception) {
            return [
                "error" => $exception->getMessage()
            ];
        } catch (\Exception $exception) {
            return [
                "error" => $exception->getMessage()
            ];
        }
    }
    public function showForm() {
        $response_applicant_front_nid_data = request('response_applicant_front_nid_data');
        $response_applicant_back_nid_data = request('response_applicant_back_nid_data');
        $response_co_applicant_front_nid_data = request('response_co_applicant_front_nid_data');
        $response_co_applicant_back_nid_data = request('response_co_applicant_back_nid_data');
        $response_guarantor_front_data = request('response_guarantor_front_data');
        $response_guarantor_back_data = request('response_guarantor_back_data');
        $response_second_guarantor_front_data = request('response_second_guarantor_front_data');
        $response_second_guarantor_back_data = request('response_second_guarantor_back_data');
        
        return view('admin.application.create', compact(
            'response_applicant_front_nid_data',
            'response_applicant_back_nid_data',
            'response_co_applicant_front_nid_data',
            'response_co_applicant_back_nid_data',
            'response_guarantor_front_data',
            'response_guarantor_back_data',
            'response_second_guarantor_front_data',
            'response_second_guarantor_back_data'
        ));
    }

    public function insertApplicationData(Request $request) {
        $nid = str_replace(' ',"", $request->nid);
        $request->request->add(['nid' => $nid]);

        $this->validate($request, [
            'name' => 'required|max:255',
            'phone' => 'required|regex:/\+?(88)?01[3456789][0-9]{8}\b/',
            'address' => 'required|max:255',
            'applicant_nid_address' => 'required|max:255',
            'officeName' => 'required|max:255',
            'officeAddress' => 'required',
            'designation' => 'required',
            'nid' => 'required|numeric',
            'co_applicant_name' => 'max:255',
            'co_applicant_phone' => 'nullable|regex:/\+?(88)?01[3456789][0-9]{8}\b/',
            'co_applicant_address' => 'max:255',
            'co_applicant_nid_address' => 'max:255',
            'co_applicant_officeName' => 'max:255',
            'co_applicant_officeAddress' => 'max:255',
            'co_applicant_designation' => 'max:255',
            'co_applicant_nid' => 'nullable',
            'co_applicant_image' => 'nullable|mimes:jpg,png',
            'guarantor_name' => 'max:255',
            'guarantor_phone' => 'nullable|regex:/\+?(88)?01[3456789][0-9]{8}\b/',
            'guarantor_address' => 'max:255',
            'nid_address' => 'max:255',
            'guarantor_officeName' => 'max:255',
            'guarantor_officeAddress' => 'max:255',
            'guarantor_designation' => 'max:255',
            'guarantor_nid' => 'nullable',
            'image_upload' => 'required|mimes:jpg,png',
            'guarantor_image' => 'nullable|mimes:jpg,png',
            'second_guarantor_name' => 'max:255',
            'second_guarantor_phone' => 'nullable|regex:/\+?(88)?01[3456789][0-9]{8}\b/',
            'second_guarantor_address' => 'max:255',
            'second_nid_address' => 'max:255',
            'second_guarantor_officeName' => 'max:255',
            'second_guarantor_officeAddress' => 'max:255',
            'second_guarantor_designation' => 'max:255',
            'second_guarantor_nid' => 'nullable',
            'second_guarantor_image' => 'nullable|mimes:jpg,png',
            'loi_files' => 'max:10000',
            'bank_withdrawal_files' => 'max:10000',
            'rental_deed_files' => 'max:10000'
        ]);
        
        //application data store
            $session_data_fetch = Session::get('request_type');
            $file_handler = new FileHandler();         
            $file_name = $request->phone.'_'.rand(10000,99999);
            $image_file_path = $file_handler->uploadFile($request->file('image_upload'),$file_name);       
            $insertData = Application::create([
                'user_id' => rand(1000,9999),
                'name' => $request->name,
                'phone_number' => $request->phone,
                'present_address' => $request->address,
                'nid_address' => $request->applicant_nid_address,
                'office_business_name' => $request->officeName,
                'office_business_address' => $request->officeAddress,
                'designation' => $request->designation,
                'nid' => $nid,
                'applicant_image' => $image_file_path,
            ]);
            //create application id
        $application_id_generator = new ApplicationIdGenerator();
        $application_id = $application_id_generator->ApplicationIdGenerate($insertData->id);
        Application::where('id', $insertData->id)
        ->update([
            'application_id' => $application_id
        ]);
        //types store
        foreach($session_data_fetch as $type) {
            $insertTypes = Type::create([
                'application_id' => $insertData->id,
                'type' => $type
            ]);
        }
        //co-applicant data store
        $co_applicant_nid = str_replace(' ',"", $request->co_applicant_nid);
        $request->request->add(['nid_number' => $co_applicant_nid]);

        if($request->hasFile('co_applicant_image')) {
            $file_name = $request->phone.'_'.rand(10000,99999);
            $co_applicant_image_path = $file_handler->uploadFile($request->file('co_applicant_image'),$file_name);
            $store_nid = CoApplicant::create([
                'application_id' => $insertData->id,
                'name' => $request->co_applicant_name,
                'phone_number' => $request->co_applicant_phone,
                'present_address' => $request->co_applicant_address,
                'nid_address' => $request->co_applicant_nid_address,
                'office_business_name' => $request->co_applicant_officeName,
                'office_business_address' => $request->co_applicant_officeAddress,
                'designation' => $request->co_applicant_designation,
                'nid_number' => $request->co_applicant_nid,
                'co_applicants_image' => $co_applicant_image_path,
            ]);
        }
        //for guarantor data store    
            $guarantor_nid = str_replace(' ',"", $request->guarantor_nid);
            $request->request->add(['nid' => $guarantor_nid]);

            $file_name = $request->phone.'_'.rand(100,999);
            $guarantor_image_path = $file_handler->uploadFile($request->file('guarantor_image'),$file_name);
            $store_nid = GuarantorNid::create([
                'application_id' => $insertData->id,
                'name' => $request->guarantor_name,
                'phone_number' => $request->guarantor_phone,
                'present_address' => $request->guarantor_address,
                'nid_address' => $request->nid_address,
                'office_business_name' => $request->guarantor_officeName,
                'office_business_address' => $request->guarantor_officeAddress,
                'designation' => $request->guarantor_designation,
                'nid' => $request->guarantor_nid,
                'guarantor_image' => $guarantor_image_path,
            ]);

            // 2nd guarantor data
            $second_guarantor_nid = str_replace(' ',"", $request->second_guarantor_nid);
            $request->request->add(['nid_number' => $second_guarantor_nid]);

            if($request->hasFile('second_guarantor_image')) {
            $file_name = $request->phone.'_'.rand(100,999);
            $second_guarantor_image_path = $file_handler->uploadFile($request->file('second_guarantor_image'),$file_name);
            $store_nid = SecondGuarantor::create([
                'application_id' => $insertData->id,
                'name' => $request->second_guarantor_name,
                'phone_number' => $request->second_guarantor_phone,
                'present_address' => $request->second_guarantor_address,
                'nid_address' => $request->second_nid_address,
                'office_business_name' => $request->second_guarantor_officeName,
                'office_business_address' => $request->second_guarantor_officeAddress,
                'designation' => $request->second_guarantor_designation,
                'nid_number' => $request->second_guarantor_nid,
                'second_guarantors_image' => $second_guarantor_image_path,
            ]);
            }  
        //file upload in db
        $file_handler = new FileHandler();

        if ($request->hasFile('loi_files')) {
            foreach($request->file('loi_files') as $file)
            {
                $file_name = $request->phone.'_'.rand(10000,99999);
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
                $file_name = $request->phone.'_'.rand(10000,99999);
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
                $file_name = $request->phone.'_'.rand(10000,99999);
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
