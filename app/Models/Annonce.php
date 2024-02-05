<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Annonce extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['titre', 'contenu', 'entreprise_id'];
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }
}
