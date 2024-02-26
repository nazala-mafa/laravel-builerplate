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
        $superadminUser = User::factory()->create([
            'name' => 'superadmin',
            'email' => 'superadmin@mail.com',
            'password' => \Hash::make('1234'),
        ]);
        $superadminRole = Role::create(['name' => 'superadmin']);
        $superadminUser->assignRole($superadminRole);
        
        $adminUser = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => \Hash::make('1234'),
        ]);
        $adminRole = Role::create(['name' => 'admin']);
        $adminUser->assignRole($adminRole);

        $financeUser = User::factory()->create([
            'name' => 'finance',
            'email' => 'finance@mail.com',
            'password' => \Hash::make('1234'),
        ]);
        $financeRole = Role::create(['name' => 'finance']);
        $financeUser->assignRole($financeRole);
    }
}
