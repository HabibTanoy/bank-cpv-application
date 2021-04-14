<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoApplicant extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'co_applicants';
}
