<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixArticleCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  
        Schema::table('article_categories', function (Blueprint $table) {
            
                        $table->string('short_name', 100)->default('')->nullable()->change();  //分类短名称
                        $table->string('summary', 1000)->default('')->nullable()->change();
                        $table->text('desc')->default('')->nullable()->change();
                        $table->string('cover', 255)->default('')->nullable()->change();
                        $table->string('icon', 255)->default('')->nullable()->change();
            });
            
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
