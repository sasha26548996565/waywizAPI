<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IndustrySeeder extends Seeder
{
    private array $names = [
        'SUSTAINABILITY & ENVIRONMENT',
        'HEALTHCARE',
        'TECH',
        'FINANCE & FINTECH',
        'CREATIVE INDUSTRIES AND MARKETING'
    ];

    public function run(): void
    {
        foreach ($this->names as $name) {
            Industry::create([
                'name' => $name
            ]);
        }
    }
}
