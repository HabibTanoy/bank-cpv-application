<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondGuarantor extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'second_guarantors';
}

