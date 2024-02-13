<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDatingOffer extends Model
{
    public function applicants()
{
    return $this->belongsToMany(User::class, 'job_dating_applications')->withTimestamps();
}

}
