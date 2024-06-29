<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Role;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use App\Models\User;
use Database\Factories\PerfilFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        
        Categoria::factory(5)->create();
        Producto::factory(30)->create();
        Role::factory(10)->create();
        Profile::factory(10)->create();

    }
}
