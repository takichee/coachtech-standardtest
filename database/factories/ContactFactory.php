<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name,
            'gender' => $this->faker->numberBetween(1, 2),
            'email' => $this->faker->email,
            'postcode' => $this->faker->numberBetween(11111111, 99999999),
            'address' => $this->faker->address,
            'building_name' => $this->faker->buildingNumber,
            'opinion' => $this->faker->text(120),
            'created_at' => $this->faker->dateTimeThisYear
        ];
    }
}
