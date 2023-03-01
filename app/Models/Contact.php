<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'youtube', 'facbook','backgroundvoice'];
    protected $hidden=['created_at','updated_at'];

    public static function CheckContact()
    {
        $contact = self::all();
        if (count($contact) < 1) {
            $data = [
                'id' => 1
            ];
            self::create($data);
        }
        return self::first();
    }
}
