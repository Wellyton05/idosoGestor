<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'idade',
        'nome_responsavel',
        'contato_responsavel',
        'cpf',
        'estado_saude',
        'photo',
    ];

    public function activities(){
        return $this->belongsToMany(Activity::class, 'activity_resident', 'resident_id', 'activity_id');
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }

    public function user()
    {
    return $this->belongsTo(User::class);
    }

}