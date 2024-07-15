<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masseur extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'full_name'];
    
    /**
     * Make relation with MasseurDetails model
     */
    public function details()
    {
        return $this->hasOne(MasseurDetails::class)->withDefault();
    }

    /**
     * Make relation with Salon model
     */
    public function salon()
    {
        return $this->belongsTo(Salon::class);
    }
}
