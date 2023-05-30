<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_folders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('フォルダ名');
            $table->timestamps();
        });
        DB::statement("Alter Table template_folders Comment 'テンプレートフォルダ情報テーブル'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('template_folders');
    }
};
