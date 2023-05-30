<?php

namespace Database\Seeders;

use App\Models\Folder;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $folders = Folder::get();

        $tasks = [
            '仕事' => [
                '日報提出',
                '希望休締切日',
                '休日出勤',
                '会議資料作成',
                '出張',
                'インシデント対応',
                '飲み会(接待)',
            ],
            'プライベート' => [
                '外食に行く',
                '旅行に行く',
                'プログラミングを教えてもらう',
                'セミナーに行く',
                'BBQ‼',
                'この日は寝る!!',
            ],
            '催事事' => [
                '雪集める',
                '防寒着を買う',
                '雪像を作る',
                '雪に水をかける',
                'おすすめのラーメンの店に行く',
            ],
        ];
        Task::truncate();
        foreach ($folders as $folder) {
            if (random_int(0, 1) == 0 && $folder->user_id != 1) continue;
            foreach ($tasks[$folder->name] as $task) {
                if (random_int(0, 1) == 0 && $folder->user_id != 1) continue;
                Task::factory()->setFolders($folder->id, $task)->create();
            }
        }
    }
}
