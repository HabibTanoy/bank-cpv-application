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
}
