<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Folder extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Laravel Custom Attribute
     */

    /**
     * Laravel Relationship
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Laravel Model Function
     */

    /**
     * フォルダ一覧表示 and フォルダ検索メソッド
     *
     * @param Request $request
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getFolders($request)
    {
        $query = Self::query();

        // bladeで書いたname属性をfilledの引数に入れてあげる。
        if ($request->filled('name')) {
            $name = $request->name;
            $query->where('name', 'Like', "%$name%");
        }
        $query->where('user_id', Auth::user()->id);
        return $query->get();
    }

    /**
     * タスク一覧表示 and タスク検索メソッド
     *
     * @param Request $request
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getFolder($request, $id)
    {
        $query = Self::with('tasks')->withCount(['tasks' => function ($query) {
            $query->where('situation', '!=', '完了');
        }]);

        if ($request->filled('name')) {
            $name = $request->name;
            $query->with('tasks', function ($query) use ($name) {
                $query->where('tasks.name', 'Like', "%$name%");
            });
        }
        $query->where('id', $id);
        return $query->first();
    }

    /**
     * folders CURD時処理
     */
    public static function boot()
    {
        parent::boot();
        /* Delete時 実行処理 */
        static::deleting(function ($folder) {
            // リレーション先のtasksを物理削除
            $folder->tasks()->delete();
        });
    }
}
