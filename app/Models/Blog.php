<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';

    protected $fillable = [
      'id',
      'title',
      'contents',
    ];
    public function getUserId(){
        return $this->hasOne(User::class, "id", "user_id");
    }

}
