<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
    ];

    public function residents(){
        return $this->belongsToMany(Resident::class, 'activity_resident',  'activity_id', 'resident_id');
    }
}
