<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable=['name','category_id','link','image','answer_1','answer_2','answer_3','answer_4','correct_answer'];
    protected $hidden=['created_at','updated_at'];

    public function category(){
        return $this->belongsTo(QuestionCategory::class);
    }
}
