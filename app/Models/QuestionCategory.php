<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionCategory extends Model
{
    use HasFactory;
    protected $fillable=['name','background','image'];
    protected $hidden=['created_at','updated_at'];

    public function questions(){
        return $this->hasMany(Question::class);
    }
}
