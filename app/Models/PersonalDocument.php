<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PersonalDetail;

class PersonalDocument extends Model
{
    public $guarded=[""];
    protected $table='personal_documents';
    protected $primaryKey='document_id';


     public function personaldocument()
    {
    	return $this->belongsTo(PersonalDetail::class,'id');
    }
}
