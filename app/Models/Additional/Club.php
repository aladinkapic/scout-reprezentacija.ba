<?php

namespace App\Models\Additional;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Club extends Model{
    protected $guarded = ['id'];

    public function ownerRel(){
        return $this->hasOne(User::class, 'id', 'owner');
    }
}
