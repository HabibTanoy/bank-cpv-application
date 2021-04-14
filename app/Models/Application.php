<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attachment;

class Application extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'applications';

    public function attachments()
    {
        return $this->hasMany(Attachment::class,'application_id','id');
    }

    public function types() {
        return $this->hasmany(Type::class,'application_id','id');
    }

    public function guarantors() {
        return $this->hasmany(GuarantorNid::class,'application_id','id');
    }

    public function co_applicant() {
        return $this->hasmany(CoApplicant::class,'application_id','id');
    }

    public function second_guarantor() {
        return $this->hasmany(SecondGuarantor::class,'application_id','id');
    }
}
