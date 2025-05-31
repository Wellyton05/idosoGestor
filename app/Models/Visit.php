<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'hora',
        'visitante', 
        'resident_id',
        // adicione outros campos que quiser permitir mass assignment
    ];

    public function residente() {
        return $this->belongsTo(Resident::class, 'resident_id');
    }

    protected $casts = [
        'data' => 'datetime',
    ];
}
