<?php

namespace Database\Seeders;

use App\Models\Empresa;
use App\Models\Evento;
use App\Models\Ticket;
use App\Models\Cliente;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Venta;
use Grpc\Call;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Vaciar las colecciones antes de crear nuevos datos ( en Mongo no aplica el migrate:fresh )
        Ticket::truncate();  // Vacía la colección de Ticket
        Venta::truncate();   // Vacía la colección de Venta

        Ticket::factory(12)->create();
        Venta::factory()->count(5)->create();
        Venta::where('lineas_venta', 'size', 0)->delete();

        $this->call([
            UserSeeder::class,
        ]);
        Cliente::factory()->count(25)->create();
        Empresa::factory()->count(25)->create();
        Evento::factory()->count(50)->create();
    }
}
