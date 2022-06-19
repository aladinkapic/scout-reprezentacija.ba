<?php

namespace App\Models\Players;

use Illuminate\Database\Eloquent\Model;

class PlayerRate extends Model{
    protected $table = 'users__rates';
    protected $guarded = ['id'];
}
