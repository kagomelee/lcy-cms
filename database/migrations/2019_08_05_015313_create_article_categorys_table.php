<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCategorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_categorys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parent_id')->default(0);  //父类ID 默认 0
            $table->integer('order')->default(0);  //分类排序
            $table->string('name', 255);   //分类名称
            $table->string('short_name', 100);   //分类短名称
            $table->string('summary', 1000);   //摘要描述
            $table->text('desc');   //分类描述
            $table->string('cover', 255);//封面图(url);
            $table->string('icon', 255);//小图标
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_categorys');
    }
}
