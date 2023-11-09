<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $guarded = [];

    // ============================
    // Eloquent: Relationships
    // ============================
    public function regions()
    {
        return $this->belongsToMany(Region::class);
    }
}
