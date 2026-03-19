<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected  $fillable= [
        'titre',
        'description',
        'prix',
        'ville',
        'adresse',
        'code_postal',
        'surface',
        'vendu',
    ];

    public function tag (){
        return $this->belongsTo(Tag::class);
    }

}
