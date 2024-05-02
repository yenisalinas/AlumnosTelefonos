<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "Cuenta" =>fake()->unique()->word,
            "Nombre"=>fake()->firstName()." ".fake()->lastName(),
            "Nota"=>fake()->numberBetween(0,100),
            "Carrera" =>fake()->randomElement(['Informatica', 'Enfermeria', 'Tecnico en Cafe', 'Agroindustria', 'Administracion de Empresas']),
        ];
    }
}
