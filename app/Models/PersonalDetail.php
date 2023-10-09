<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalDetail extends Model
{
    use HasFactory;
    public $guarded=[""];
    protected $table='personal_detail';
    // protected $primaryKey='personal_detail_id';
}
