<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateFolder extends Model
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
    public function templateTasks()
    {
        return $this->hasMany(TemplateTask::class);
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
    public static function getTemplateFolders($request)
    {
        $query = Self::query();

        // bladeで書いたname属性をfilledの引数に入れてあげる。
        if ($request->filled('name')) {
            $name = $request->name;
            $query->where('name', 'Like', "%$name%");
        }
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
    public static function getTemplateFolder($request, $id)
    {
        $query = Self::with('templateTasks');

        if ($request->filled('name')) {
            $name = $request->name;
            $query->with('templateTasks', function ($query) use ($name) {
                $query->where('template_tasks.name', 'Like', "%$name%");
            });
        }
        $query->where('id', $id);
        return $query->first();
    }
}
