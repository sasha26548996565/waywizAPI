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

    private array $messages = [
        ["email" => "maxcoder12@gmail.com", "text" => "Как мне написать программу, которая говорит 'Привет, мир'?", "is_user" => true, "created_at" => "2025-03-01T09:15:00Z"],
        ["email" => "maxcoder12@gmail.com", "text" => "Привет! 😊 В Python это очень просто! Напиши так:\n```python\nprint('Привет, мир!')\n```\n🚀 Легко и быстро!", "is_user" => false, "created_at" => "2025-03-01T09:16:30Z"],
        ["email" => "maxcoder12@gmail.com", "text" => "А можно сделать, чтобы она повторяла это 5 раз?", "is_user" => true, "created_at" => "2025-03-01T09:15:00Z"],
        ["email" => "maxcoder12@gmail.com", "text" => "Конечно! 🎉 Используй цикл:\n```python\nfor i in range(5):\n    print('Привет, мир!')\n```\n🔄 Теперь программа повторит приветствие 5 раз!", "is_user" => false, "created_at" => "2025-03-01T09:17:10Z"],

        ["email" => "kotprog@gmail.com", "text" => "Как сделать кнопку в HTML, чтобы она что-то делала?", "is_user" => true, "created_at" => "2025-03-02T10:30:00Z"],
        ["email" => "kotprog@gmail.com", "text" => "Привет! 👋 Используй тег `<button>` и добавь к нему обработчик на JavaScript:\n```html\n<button onclick='alert(\"Ты нажал кнопку!\")'>Нажми меня!</button>\n```\n🖱️ Теперь при нажатии появится всплывающее сообщение!", "is_user" => false, "created_at" => "2025-03-02T10:31:45Z"],
        ["email" => "kotprog@gmail.com", "text" => "А как сделать так, чтобы она меняла цвет страницы?", "is_user" => true, "created_at" => "2025-03-02T10:30:00Z"],
        ["email" => "kotprog@gmail.com", "text" => "Добавь в обработчик вот такой код:\n```javascript\ndocument.body.style.backgroundColor = 'blue';\n```\n🎨 Теперь фон станет синим!", "is_user" => false, "created_at" => "2025-03-02T10:33:20Z"],
    ];

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
