<?php

namespace App\Models\Additional;

use App\Models\Core\Affiliation;
use App\Models\Core\Keywords\Keyword;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Club extends Model{
    protected $guarded = ['id'];

    public function countryRel(){
        return $this->hasOne(Affiliation::class, 'id', 'country');
    }
    public function categoryRel(){
        return $this->hasOne(Keyword::class, 'id', 'category');
    }
    public function ownerRel(){
        return $this->hasOne(User::class, 'id', 'owner');
    }
}
