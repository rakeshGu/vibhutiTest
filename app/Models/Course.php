<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable=['name', 'topic_id', 'price_range'];
    function topic(){
        return $this->belongsTo(Topic::class) ;
    }

    function Speakers(){
        return $this->belongsToMany(Speaker::class,"courses_speakers","course_id","speaker_id")
            ->withTimestamps();
    }
}
