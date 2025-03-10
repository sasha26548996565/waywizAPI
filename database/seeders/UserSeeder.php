<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    private array $users = [
        [
            "name" => "МаксКодер12",
            "email" => "maxcoder12@gmail.com",
            "password" => "pass1234",
            "created_at" => "2024-02-29 10:00:00"
        ],
        [
            "name" => "КотПрограммист",
            "email" => "kotprog@gmail.com",
            "password" => "meowcode",
            "created_at" => "2024-02-29 11:00:00"
        ],
        [
            "name" => "ЛенаРазработчик",
            "email" => "lenadev@gmail.com",
            "password" => "lenapass",
            "created_at" => "2024-02-29 12:00:00"
        ],
        [
            "name" => "АртемПитон",
            "email" => "artempython@gmail.com",
            "password" => "pythonlover",
            "created_at" => "2024-02-29 13:00:00"
        ],
        [
            "name" => "ДашаJS",
            "email" => "dashajs@gmail.com",
            "password" => "jsrocks",
            "created_at" => "2024-02-29 14:00:00"
        ],
        [
            "name" => "ВоваГеймДев",
            "email" => "vovagame@gmail.com",
            "password" => "gamemaker",
            "created_at" => "2024-02-29 15:00:00"
        ],
        [
            "name" => "СашаХакер",
            "email" => "sashahacker@gmail.com",
            "password" => "ilovehacking",
            "created_at" => "2024-02-29 16:00:00"
        ],
        [
            "name" => "ПетяПрограммер",
            "email" => "petya123@gmail.com",
            "password" => "mypassword",
            "created_at" => "2024-02-29 17:00:00"
        ],
        [
            "name" => "КсюшаКод",
            "email" => "ksucode@gmail.com",
            "password" => "codingisfun",
            "created_at" => "2024-02-29 18:00:00"
        ],
        [
            "name" => "ТимурDev",
            "email" => "timurdev@gmail.com",
            "password" => "devlife",
            "created_at" => "2024-02-29 19:00:00"
        ]
    ];

    public function run(): void
    {
        foreach ($this->users as $user) {
            User::create($user);
        }
    }
}
