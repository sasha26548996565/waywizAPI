<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use App\Models\Message;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MessageSeeder extends Seeder
{
    private array $userEmails = [
        "maxcoder12@gmail.com",
        "kotprog@gmail.com",
        "lenadev@gmail.com",
        "artempython@gmail.com",
        "dashajs@gmail.com",
        "vovagame@gmail.com",
        "sashahacker@gmail.com",
        "petya123@gmail.com",
        "ksucode@gmail.com",
        "timurdev@gmail.com"
    ];

    private array $messages = [];

    public function generateMessages()
    {
        $userEmails = $this->userEmails;
        $messages = [
            [
                "text" => "Как мне написать программу, которая говорит 'Привет, мир'?",
                "is_user" => true,
                "created_at" => "2025-03-01T09:15:00Z"
            ],
            [
                "text" => "Привет! 😊 В Python это очень просто! Напиши так:\npython\nprint('Привет, мир!')\n\n🚀 Легко и быстро!",
                "is_user" => false,
                "created_at" => "2025-03-01T09:16:30Z"
            ],
            [
                "text" => "А можно сделать, чтобы она повторяла это 5 раз?",
                "is_user" => true,
                "created_at" => "2025-03-01T09:15:00Z"
            ],
            [
                "text" => "Конечно! 🎉 Используй цикл:\npython\nfor i in range(5):\n    print('Привет, мир!')\n\n🔄 Теперь программа повторит приветствие 5 раз!",
                "is_user" => false,
                "created_at" => "2025-03-01T09:17:10Z"
            ],
            [
                "text" => "Как сделать кнопку в HTML, чтобы она что-то делала?",
                "is_user" => true,
                "created_at" => "2025-03-02T10:30:00Z"
            ],
            [
                "text" => "Привет! 👋 Используй тег <button> и добавь к нему обработчик на JavaScript:\nhtml\n<button onclick='alert(\"Ты нажал кнопку!\")'>Нажми меня!</button>\n\n🖱️ Теперь при нажатии появится всплывающее сообщение!",
                "is_user" => false,
                "created_at" => "2025-03-02T10:31:45Z"
            ],
            [
                "text" => "А как сделать так, чтобы она меняла цвет страницы?",
                "is_user" => true,
                "created_at" => "2025-03-02T10:30:00Z"
            ],
            [
                "text" => "Добавь в обработчик вот такой код:\njavascript\ndocument.body.style.backgroundColor = 'blue';\n\n🎨 Теперь фон станет синим!",
                "is_user" => false,
                "created_at" => "2025-03-02T10:33:20Z"
            ]
        ];

        foreach ($messages as $index => &$message) {
            $message["email"] = $userEmails[$index % count($userEmails)];
        }

        $this->messages = $messages;
    }

    public function run(): void
    {
        $users = User::whereIn('email', $this->userEmails)->pluck('id', 'email')->toArray();

        foreach ($this->messages as $message) {
            Message::create([
                "user_id" => $users[$message["email"]] ?? null,
                "text" => $message["text"],
                "is_user" => $message["is_user"],
                "created_at" => $message["created_at"]
            ]);
        }
    }
}
