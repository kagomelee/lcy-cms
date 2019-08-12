<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->default(0);  //分类ID   先支持单分类   
            $table->string('title', 255);   //标题
            $table->string('short_title', 100);   //短标题
            $table->string('summary', 1000);   //摘要
            $table->text('desc');   //详情
            $table->string('cover', 255);//封面图(url);            
            $table->string('author', 255);//作者;
            $table->integer('order')->default(0);  //排序
            $table->string('admin_id')->default(0);//发布者ID ;
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
        Schema::dropIfExists('articles');
    }
}
