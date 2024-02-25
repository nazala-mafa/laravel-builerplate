<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => \Hash::make('1234'),
        ]);

        $adminRole = Role::create(['name' => 'admin']);

        $adminUser->assignRole($adminRole);
    }
}
