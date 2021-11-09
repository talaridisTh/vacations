<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Vacation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VacationFactory extends Factory {

    protected $model = Vacation::class;

    public function definition()
    {

        $start = $this->faker->dateTimeBetween('now', '+1 years');
        $end = $this->faker->dateTimeBetween($start, $start->format('Y-m-d') . ' +20 days');;

        return [
            'vacation_start' => $start,
            'vacation_end' => $end,
            'reason' => $this->faker->sentence,
            'status' => $this->faker->randomElement(["rejected", "approved", "pending"]),
            "created_at" => $start,
        ];
    }

}
