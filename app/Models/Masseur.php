<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masseur extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    
    /**
     * Make relation with MasseurDetails model
     */
    public function details()
    {
        return $this->hasOne(MasseurDetails::class);
    }

    /**
     * Make relation with Salon model
     */
    public function salon()
    {
        return $this->belongsTo(Salon::class);
    }
}
