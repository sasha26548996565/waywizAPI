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
                "text" => "Привет! 😊 В Python это очень просто! Напиши так:\n\npython\nprint('Привет, мир!')\n\n🚀 Легко и быстро!",
                "is_user" => false,
                "created_at" => "2025-03-01T09:16:30Z"
            ],
            [
                "text" => "А можно сделать, чтобы она повторяла это 5 раз?",
                "is_user" => true,
                "created_at" => "2025-03-01T09:15:00Z"
            ],
            [
                "text" => "Конечно! 🎉 Используй цикл:\n\npython\nfor i in range(5):\n    print('Привет, мир!')\n\n🔄 Теперь программа повторит приветствие 5 раз!",
                "is_user" => false,
                "created_at" => "2025-03-01T09:17:10Z"
            ],
            [
                "text" => "Как сделать кнопку в HTML, чтобы она что-то делала?",
                "is_user" => true,
                "created_at" => "2025-03-02T10:30:00Z"
            ],
            [
                "text" => "Привет! 👋 Используй тег <button> и добавь к нему обработчик на JavaScript:\n\nhtml\n<button onclick='alert(\"Ты нажал кнопку!\")'>Нажми меня!</button>\n\n🖱️ Теперь при нажатии появится всплывающее сообщение!",
                "is_user" => false,
                "created_at" => "2025-03-02T10:31:45Z"
            ],
            [
                "text" => "А как сделать так, чтобы она меняла цвет страницы?",
                "is_user" => true,
                "created_at" => "2025-03-02T10:30:00Z"
            ],
            [
                "text" => "Добавь в обработчик вот такой код:\n\njavascript\ndocument.body.style.backgroundColor = 'blue';\n\n🎨 Теперь фон станет синим!",
                "is_user" => false,
                "created_at" => "2025-03-02T10:33:20Z"
            ],
            [
                "text" => "Что такое переменные в программировании?",
                "is_user" => true,
                "created_at" => "2025-03-03T11:45:00Z"
            ],
            [
                "text" => "Переменные — это как коробки 📦, куда ты кладёшь данные. Например, в Python:\n\npython\nname = 'Лена'\n\nТеперь в name хранится твое имя! 😃",
                "is_user" => false,
                "created_at" => "2025-03-03T11:46:50Z"
            ],
            [
                "text" => "А можно хранить числа?",
                "is_user" => true,
                "created_at" => "2025-03-03T11:45:00Z"
            ],
            [
                "text" => "Конечно! 🔢 Например:\n\npython\nage = 10\n\nТеперь age хранит число 10!",
                "is_user" => false,
                "created_at" => "2025-03-03T11:48:15Z"
            ],
            [
                "text" => "Как сделать простую игру на Python?",
                "is_user" => true,
                "created_at" => "2025-03-04T12:20:00Z"
            ],
            [
                "text" => "Попробуй библиотеку Pygame! 🎮 Например, можно нарисовать круг, который двигается:\n\npython\nimport pygame\npygame.init()\nscreen = pygame.display.set_mode((500, 500))\n...pygame.quit()\n",
                "is_user" => false,
                "created_at" => "2025-03-04T12:21:40Z"
            ],
            [
                "text" => "А как сделать, чтобы он двигался по стрелкам?",
                "is_user" => true,
                "created_at" => "2025-03-04T12:20:00Z"
            ],
            [
                "text" => "Используй pygame.KEYDOWN и меняй координаты круга! ⬅️➡️\n\npython\nif event.type == pygame.KEYDOWN:\n    if event.key == pygame.K_LEFT:\n        x -= 5\n    elif event.key == pygame.K_RIGHT:\n        x += 5\n",
                "is_user" => false,
                "created_at" => "2025-03-04T12:23:10Z"
            ],
            [
                "text" => "Что такое массивы?",
                "is_user" => true,
                "created_at" => "2025-03-05T13:10:00Z"
            ],
            [
                "text" => "Массив — это как коробка с игрушками 🧸, только вместо игрушек там данные! В Python это списки:\n\npython\ntoys = ['машинка', 'мяч', 'кукла']\n",
                "is_user" => false,
                "created_at" => "2025-03-05T13:11:30Z"
            ],
            [
                "text" => "А как добавить туда новый элемент?",
                "is_user" => true,
                "created_at" => "2025-03-05T13:10:00Z"
            ],
            [
                "text" => "Используй append() 📥:\n\npython\ntoys.append('лего')\n\nТеперь у тебя новый элемент в массиве!",
                "is_user" => false,
                "created_at" => "2025-03-05T13:13:00Z"
            ],
            [
                "text" => "Как работать с датами в Python?",
                "is_user" => true,
                "created_at" => "2025-03-06T14:00:00Z"
            ],
            [
                "text" => "Используй модуль datetime! 📅 Например:\n\npython\nimport datetime\ntoday = datetime.date.today()\nprint(today)\n\nВыведет текущую дату!",
                "is_user" => false,
                "created_at" => "2025-03-06T14:02:30Z"
            ],
            [
                "text" => "Как посчитать разницу между двумя датами?",
                "is_user" => true,
                "created_at" => "2025-03-06T14:00:00Z"
            ],
            [
                "text" => "Легко! Используй timedelta:\n\npython\nd1 = datetime.date(2025, 3, 1)\nd2 = datetime.date(2025, 3, 7)\ndelta = d2 - d1\nprint(delta.days)\n\n📆 Это покажет разницу в днях!",
                "is_user" => false,
                "created_at" => "2025-03-06T14:04:00Z"
            ],
            [
                "text" => "Как отсортировать список чисел?",
                "is_user" => true,
                "created_at" => "2025-03-07T15:30:00Z"
            ],
            [
                "text" => "Используй sorted():\n\npython\nnumbers = [5, 2, 9, 1]\nprint(sorted(numbers))\n\n📊 Отсортирует список по возрастанию!",
                "is_user" => false,
                "created_at" => "2025-03-07T15:32:20Z"
            ]
        ];


        foreach ($messages as $index => &$message) {
            $message["email"] = $userEmails[$index % count($userEmails)];
        }

        $this->messages = $messages;
    }

    public function run(): void
    {
        $this->generateMessages();
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
