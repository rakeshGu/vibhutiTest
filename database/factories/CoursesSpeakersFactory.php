<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Speaker;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoursesSpeakersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => Course::inRandomOrder()->first()->id,
            'speaker_id' => Speaker::inRandomOrder()->first()->id,
        ];
    }
}
