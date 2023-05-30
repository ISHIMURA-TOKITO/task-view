<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // テーブル内容初期化
        Comment::truncate();

        // 登録値定義
        $comments = [
            '千里の道も一歩から！',
            '無理のない計画を',
            '時には人を頼ること',
            '目の前のことに集中しよう',
            '「明日やろう」はばかやろう',
            '適度に息抜きも大事ですよ！',
            'タスクの共有はしっかり出来ていますか？',
            'ちりつも～',
            '最終確認まで気を抜かず！',
            'タスク可視化で作業効率アップ！',
        ];

        // Modelインスタンス生成
        $models = [];
        foreach($comments As $comment) {
            $model = new Comment;
            $model->content = $comment;
            $models[] = $model;
        }

        // DB登録
        foreach($models As $model) {
            $model->save();
        }
    }
}
