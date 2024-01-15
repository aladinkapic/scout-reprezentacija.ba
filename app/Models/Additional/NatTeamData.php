<?php

namespace App\Models\Additional;

use App\Models\Core\Affiliation;
use App\Models\Core\Country;
use App\Models\Core\Keywords\Keyword;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NatTeamData extends Model{
    use SoftDeletes;
    protected $table = 'users__nat_team_data';
    protected $guarded = ['id'];

    public function userRel(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function countryRel(){
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
    public function seasonRel(){
        return $this->hasOne(Keyword::class, 'id', 'season');
    }
}
