<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table= "todo_content";
    protected $primaryKey= "id";
}
