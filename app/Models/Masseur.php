<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masseur extends Model
{
    use HasFactory;

    /**
     * Make relation with MasseurDetails model
     */
    public function details()
    {
        return $this->hasOne(MasseurDetails::class);
    }
}
