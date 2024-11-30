<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    private array $users = [
        [
            'email' => 'admin1@gmail.com',
            'password' => 'tester123',
            'name' => '.',
            'is_admin' => true
        ],
        [
            'email' => 'admin2@gmail.com',
            'password' => 'tester123',
            'name' => '.',
            'is_admin' => true
        ],
        [
            'email' => 'admin3@gmail.com',
            'password' => 'tester123',
            'name' => '.',
            'is_admin' => true
        ],
        [
            'email' => 'admin4@gmail.com',
            'password' => 'tester123',
            'name' => '.',
            'is_admin' => true
        ],
    ];


    public function run(): void
    {
        foreach ($this->users as $user) {
            User::create($user);
        }
    }
}
