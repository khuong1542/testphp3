<?php

namespace App\Models;

use App\Http\Controllers\HospitalController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = 'doctors';
    protected $fillable = [
        'name',
        'hospital_id',
        'birth_date',
        'salary',
        'phone_number'
    ];
    public function hospitals(){
        return $this->belongsTo(Hospital::class, 'hospital_id', 'id');
    }
}
