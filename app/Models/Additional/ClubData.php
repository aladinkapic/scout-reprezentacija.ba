<?php

namespace App\Models\Additional;

use App\Models\Core\Keywords\Keyword;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClubData extends Model{
    use SoftDeletes;
    protected $table = 'users__club_data';
    protected $guarded = ['id'];

    public function userRel(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function clubRel(){
        return $this->hasOne(Club::class, 'id', 'club_id');
    }
    public function seasonRel(){
        return $this->hasOne(Keyword::class, 'id', 'season');
    }
}
