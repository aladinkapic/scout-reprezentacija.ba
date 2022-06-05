<?php

namespace App;

use App\Models\Core\Affiliation;
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

    /**
     * Relationship with User model
     */
    public function cityRel(){
        return $this->hasOne(Affiliation::class, 'id', 'city');
    }
    public function countryRel(){
        return $this->hasOne(Affiliation::class, 'id', 'country');
    }
}
