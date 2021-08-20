<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostEntity extends Model
{

    use HasFactory;
    protected $fillable=['title','content','user_id'];

    public function comments()
    {
        return $this->hasMany(CommentEntity::class);
    }

    public function user()
    {
        return $this->belongsTo(UserEntity::class);
    }
}
