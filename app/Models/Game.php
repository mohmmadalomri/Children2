<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected  $fillable=['name','description','image','link','category_id','backgrounder'];
    protected $hidden=['created_at','updated_at'];

    public function category(){
        return $this->belongsTo(CategoryOfGames::class);
    }
}
