<?php

namespace Database\Seeders;

use App\Enum\UserRoleEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => UserRoleEnum::ADMIN->value,
        ]);

        User::create([
            'name' => 'Kasir',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make('password'),
            'role' => UserRoleEnum::KASIR->value,
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'role' => UserRoleEnum::USER->value,
        ]);

        User::factory(10)
        ->state(new Sequence(
            ['role' => UserRoleEnum::KASIR->value],
            ['role' => UserRoleEnum::USER->value]
        ))->create();

    }
}
