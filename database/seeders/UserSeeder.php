<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'email' => 'superadmin@app.com',
            'role_id' => Role::SUPER_ADMIN
        ]);
        User::factory()->create([
            'email' => 'admin@app.com',
            'role_id' => Role::ADMIN
        ]);
        User::factory()->create([
            'email' => 'mahasiswa@app.com',
            'role_id' => Role::MAHASISWA
        ]);
    }
}
