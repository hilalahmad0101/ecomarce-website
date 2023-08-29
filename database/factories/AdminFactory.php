<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => 'Hilal Ahmad',
            'email' => 'hilal@gmail.com',
            'phone' => '894849484',
            'image' => 'https://laravel.com/img/logomark.min.svg',
            'password' => Hash::make('hilal_ahmad'),
        ];
    }
}
