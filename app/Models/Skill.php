<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $table = 'skills';
    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'skill_user');
    }
    
    
    public function annonces()
    {
        return $this->belongsToMany(Annonce::class, 'skills', 'skill_id', 'annonce_id')->withPivot('skill_user_annonce');
    }

}
