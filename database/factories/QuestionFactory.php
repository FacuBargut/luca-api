<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(3, false),
            'description'=>$this->faker->text,
            'id_student'=>$this->faker->numberBetween(1,100),
            'id_subject'=>$this->faker->randomElement([1,2,3])
        ];
    }
}
