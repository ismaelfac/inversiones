<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        Category::Create([
            'name' => 'Laravel',
            'slug' => 'laravel',
        ]);

        Category::Create([
            'name' => 'PHP',
            'slug' => 'php',
        ]);

        Category::Create([
            'name' => 'JavaScript',
            'slug' => 'javascript',
        ]);

        Category::Create([
            'name' => 'Vue.js',
            'slug' => 'vue-js',
        ]);

        Category::Create([
            'name' => 'CSS',
            'slug' => 'css',
        ]);

        Category::Create([
            'name' => 'Sass',
            'slug' => 'sass',
        ]);

        Category::Create([
            'name' => 'Git',
            'slug' => 'git',
        ]);

        Category::Create([
            'name' => 'Otras tecnologías',
            'slug' => 'otras-tecnologias',
        ]);
    }
}
