<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_id' => Student::factory(), // létrehozunk egy student-et, és visszakapjuk az id-ját
            'street_name' => $this->faker->streetName,
            'street_number' => $this->faker->buildingNumber,
            'zip' => $this->faker->numberBetween(999,9999),
            'city' => $this->faker->city,
            'siblings_num' => $this->faker->numberBetween(0,5)
        ];
    }
}
