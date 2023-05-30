<?php

namespace Database\Seeders;

use App\Models\TemplateTask;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemplateTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // テーブル内容初期化
        TemplateTask::truncate();

        // 登録値定義
        $template_tasks = [
            1 => [
                '上司に報告',
                '同僚に報告',
            ],
            2 => [
                '荷物チェック',
                '体調チェック',
            ],
            3 => [
                'ケーキ予約',
                '花束予約',
            ],
        ];

        // Modelインスタンス生成
        $models = [];
        foreach($template_tasks as $folder_id => $template_task_array) {
            foreach($template_task_array as $template_task) {
            $model = new TemplateTask;
            $model->template_folder_id = $folder_id;
            $model->name = $template_task;
            $models[] = $model;
            }
        }

        // DB登録
        foreach($models as $model) {
            $model->save();
        }
    }
}
