<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use HasFactory;
    protected $hidden=['created_at','updated_at'];

    protected $fillable=['name','link','image','category_id'];

    public function category(){
        return $this->belongsTo(QuestionCategory::class,'category_id','id');
    }
}
