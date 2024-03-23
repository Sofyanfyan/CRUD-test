<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function family(){
      return $this->belongsTo(Family::class, 'family_id');
    }
}