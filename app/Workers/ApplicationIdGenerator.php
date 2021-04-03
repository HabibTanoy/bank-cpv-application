<?php
namespace app\Workers; 
use Carbon\Carbon;

class ApplicationIdGenerator {

    function __construct() {

    }

    public function ApplicationIdGenerate($id) {
      $application_id = Carbon::now()->format('dmY').$id;
    return $application_id;
    }
}