<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Folder;
use App\Models\User;

class FolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::get();

        // テーブル内容初期化
        Folder::truncate();

        // 登録値定義
        $folders = [
            '仕事',
            'プライベート',
            '催事事',
        ];

        // Modelインスタンス生成
        $models = [];
        foreach ($users as $user) {
            if (random_int(0, 1) == 0 && $user->id != 1) continue;
            foreach ($folders as $folder) {
                if (random_int(0, 1) == 0 && $user->id != 1) continue;
                $model = new Folder;
                $model->fill([
                    'user_id' => $user->id,
                    'name' => $folder,
                ]);
                $models[] = $model;
            }
        }

        // DB登録
        foreach ($models as $model) {
            $model->save();
        }
    }
}
