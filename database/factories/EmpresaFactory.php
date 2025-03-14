<?php

namespace Database\Factories;

use App\Models\Empresa;
use App\Models\Evento;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Random\RandomException;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empresa>
 */
class EmpresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cif' => $this->generateValidCIF(),
            'name' => $this->faker->company,
            'direccion' => $this->faker->address,
            'imagen' => "https://circulantis.com/blog/wp-content/uploads/2018/07/pasos-para-crear-una-empresa-circulantis.jpg",
            'telefono' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'cuentaBancaria' => $this->faker->iban('ES'),
            'usuario_id' => User::factory()->create(['tipo' => 'empresa'])->id,
            'isDeleted' => false,
        ];
    }

    public function withEventos($count = 3)
    {
        return $this->afterCreating(function (Empresa $empresa) use ($count) {
            $empresa->eventos()->createMany(
                Evento::factory()->count($count)->make()->toArray() );
        });
    }


    public function configure()
    {
        return $this->afterCreating(function (Empresa $empresa) {
            $user = User::find($empresa->usuario_id);
            $user->assignRole('empresa');
        });
    }

    /**
     * @throws RandomException
     */
    private function generateValidCIF(): string
    {
        $letrasValidas = 'ABCDEFGHJKLMNPQRSUVW';
        $primerCaracter = $letrasValidas[random_int(0, strlen($letrasValidas) - 1)];
        $numeros = str_pad(random_int(0, 9999999), 7, '0', STR_PAD_LEFT);
        $ultimoCaracter = random_int(0, 9);

        return $primerCaracter . $numeros . $ultimoCaracter;
    }
}
