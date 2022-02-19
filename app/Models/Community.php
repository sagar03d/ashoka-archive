<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    public function parent()
    {
        return $this->belongsTo(Community::class, 'community_id');
    }
}
