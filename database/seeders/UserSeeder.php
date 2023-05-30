<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB登録失敗時、一度データを消去する
        User::truncate();

        // User FactryのsetDevelopmentUserを1件だけ呼び出す
        User::factory()->setDevelopmentUser()->count(1)->create();

        // User Factryのdefinitionでテストデータを19件作成
        User::factory()->count(19)->create();
    }
}
