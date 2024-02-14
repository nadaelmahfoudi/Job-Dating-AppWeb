<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDatingApplication extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'job_dating_offer_id'];
    public function jobDatingApplications()
    {
        return $this->hasMany(JobDatingApplication::class);
    }
    
}
