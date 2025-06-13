<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Teknologi', 'Kesehatan', 'Olahraga', 'Ekonomi', 'Pendidikan'];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}
