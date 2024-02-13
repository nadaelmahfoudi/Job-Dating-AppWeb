<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDatingApplication extends Model
{
    use HasFactory;
    public function jobDatingApplications()
    {
        return $this->hasMany(JobDatingApplication::class);
    }
}
