<?php

namespace App\Models\Blog;

use App\Http\Controllers\Controller;
use App\Models\Additional\Club;
use App\Models\Posts\PostLike;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPosts extends Model{
    use SoftDeletes;
    protected static $_months = ['Januar', 'Februar', 'Mart', 'April', 'Maj', 'Juni', 'Juli', 'August', 'Septembar', 'Oktobar', 'Novembar', 'Decembar'];
    protected static $_days   = ['Pon', 'Uto', 'Sri', 'Čet', 'Pet', 'Sub', 'Ned'];

    protected $table = 'posts';
    protected $guarded = ['id'];

    public function checkIfLiked(){
        try{
            return PostLike::where('post_id', $this->id)->where('ip', Controller::getIP())->count();
        }catch (\Exception $e){ return false; }
    }
    public function likesRel(){
        return $this->hasMany(PostLike::class, 'post_id', 'id');
    }
    public function createdAt(){
        try{
            $date = Carbon::parse($this->created_at);
            return ($date->format('d')).'. '.self::$_months[$date->month - 1].' '.($date->format('Y')).' - '.($date->format('H:i')).'h';
        }catch (\Exception $e){}
    }
    public function ownerRel(){
        if($this->category == 0){
            return $this->hasOne(User::class, 'id', 'owner');
        }else return $this->hasOne(Club::class, 'id', 'owner');
    }
}
