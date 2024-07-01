<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasseurDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'masseur_id', 
        'mother_name', 
        'birth_date', 
        'birth_place', 
        'visa_number', 
        'visa_expire', 
        'passport_number', 
        'passport_expire', 
        'notes'
    ];

    /**
     * Make relation with Masseur model
     */
    public function masseur()
    {
        return $this->belongsTo(Masseur::class);
    }
}
