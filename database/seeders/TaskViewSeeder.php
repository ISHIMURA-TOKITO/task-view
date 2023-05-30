<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskViewSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TemplateFolderSeeder::class,
            TemplateTaskSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
