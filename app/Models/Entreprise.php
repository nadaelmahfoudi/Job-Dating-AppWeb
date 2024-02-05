<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entreprise extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table='entreprises';
    protected $fillable=[
        "name","location","details",
    ];

    public function annonces()
    {
        return $this->hasMany(Annonce::class);
    }

    public static function boot(){
        parent::boot();
        static::deleting(function(Entreprise $entreprise){
            $entreprise->annonces()->delete();
        });
    }
}
