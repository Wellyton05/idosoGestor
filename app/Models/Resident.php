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
    ];

    public function activities(){
        return $this->belongsToMany(Activity::class, 'activity_resident');
    }

}