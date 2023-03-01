<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voice extends Model
{
    use HasFactory;
    protected $hidden=['created_at','updated_at'];

    protected $fillable=['voice_file','category_id','name'];
    public function category(){
        return $this->belongsTo(VoiceCategory::class,'category_id','id');
    }

}
