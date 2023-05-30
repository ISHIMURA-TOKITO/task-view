<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
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
    protected function limidYmd(): Attribute
    {
        return new Attribute(
            // アクセサ
            get: function () {
                $limid = ($this->limid) ? Carbon::Parse($this->limid)->format('Y-m-d') : null;
                return $limid;
            }
        );
    }

    /**
     * Laravel Relationship
     */
    // 多対一は単数形
    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    /**
     * Laravel Model Function
     */
}
