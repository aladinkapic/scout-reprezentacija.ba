<?php

namespace App;

use App\Models\Additional\Club;
use App\Models\Additional\ClubData;
use App\Models\Additional\NatTeamData;
use App\Models\Core\Affiliation;
use App\Models\Core\Keywords\Keyword;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'email_verified_at', 'api_token', 'active', 'role', 'category', 'sport',
        'position', 'stronger_limb', 'birth_date', 'years_old', 'birth_place', 'living_place', 'citizenship',
        'country', 'phone', 'gender', 'height', 'remember_token', 'note'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function birtDate(){ return ($this->birth_date) ? Carbon::parse($this->birth_date)->format('d.m.Y') : ''; }
    public function yearsOld(){ return Carbon::parse($this->birth_date)->age; }

    /**
     * Relationship with User model
     */
    public function cityRel(){
        return $this->hasOne(Affiliation::class, 'id', 'city');
    }
    public function countryRel(){
        return $this->hasOne(Affiliation::class, 'id', 'country');
    }
    public function citizenshipRel(){
        return $this->hasOne(Affiliation::class, 'id', 'citizenship');
    }
    public function clubRel(){
        return $this->hasMany(Club::class, 'owner', 'id');
    }
    public function sportRel(){
        return $this->hasOne(Keyword::class, 'id', 'sport');
    }
    public function positionRel(){
        return $this->hasOne(Keyword::class, 'id', 'position');
    }
    public function strongerLimbRel(){
        return $this->hasOne(Keyword::class, 'id', 'stronger_limb');
    }
    public function genderRel(){
        return $this->hasOne(Keyword::class, 'id', 'gender');
    }
    public function clubDataRel(){
        return $this->hasMany(ClubData::class, 'user_id', 'id')->orderBy('season', 'DESC');
    }
    public function natTeamDataRel(){
        return $this->hasMany(NatTeamData::class, 'user_id', 'id')->orderBy('season', 'DESC');
    }
}
