<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasseurDetails extends Model
{
    use HasFactory;

    /**
     * Make relation with Masseur model
     */
    public function masseur()
    {
        return $this->belongsTo(Masseur::class);
    }
}
