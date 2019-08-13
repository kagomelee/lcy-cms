<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    
    public function category()
    {
        return $this->hasOne(ArticleCategory::class,'id','category_id');
    }
    
    public function admininfo()
    {
        return $this->hasOne(\Encore\Admin\Auth\Database\Administrator::class,'id','admin_id');
    }
}
