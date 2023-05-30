<?php

namespace Database\Seeders;

use App\Models\TemplateFolder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemplateFolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // テーブル内容初期化
        TemplateFolder::truncate();

        // 登録値定義
        $template_folders = [
            '仕事',
            'プライベート',
            '催事事',
        ];

        // Modelインスタンス生成
        $models = [];
        foreach($template_folders as $template_folder) {
            $model = new TemplateFolder;
            $model->name = $template_folder;
            $models[] = $model;
        }

        // DB登録
        foreach($models As $model) {
            $model->save();
        }
    }
}
