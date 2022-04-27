<?php

namespace App\Models\Core\Keywords;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Keyword extends Model{
    use SoftDeletes;

    protected $table = '__keywords';
    protected $guarded = ['id'];
}
