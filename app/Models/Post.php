<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @Property int $id
 */
class Post extends Model
{
    protected $fillable = ['title','description'];
}
