<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;
    protected $table='entreprises';
    protected $fillable=[
        "name","location","details",
    ];

    public function annonces()
    {
        return $this->hasMany(Annonce::class);
    }
}
