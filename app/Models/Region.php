<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $guarded = [];

    // ============================ 
    // Eloquent: Relationships
    // ============================
    public function stores()
    {
        return $this->belongsToMany(Store::class);
    }
}
