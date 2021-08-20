<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentEntity extends Model
{
    use HasFactory;
    protected $fillable=['content'];

    public function post()
    {
        return $this->belongsTo(PostEntity::class);
    }
}
