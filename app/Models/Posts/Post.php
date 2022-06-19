<?php

namespace App\Models\Posts;

use App\Http\Controllers\Controller;
use App\Models\Additional\Club;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $_months = ['Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'];

    public function getDate(){
        return Carbon::parse($this->created_at)->format('d') . '. '
            . ($this->_months[(int)Carbon::parse($this->created_at)->format('m') - 1]) . ' '
            . Carbon::parse($this->created_at)->format('Y h:i');
    }
    public function getContent(){
        return Storage::get('posts/'.$this->content);
    }
    public function getUserIP(){ return Controller::getIP(); }
    public function checkIfLiked(){
        try{
            return PostLike::where('post_id', $this->id)->where('ip', Controller::getIP())->count();
        }catch (\Exception $e){ return false; }
    }

    public function userRel(){
        return $this->hasOne(User::class, 'id', 'owner');
    }
    public function clubRel(){
        return $this->hasOne(Club::class, 'id', 'owner');
    }
    public function likesRel(){
        return $this->hasMany(PostLike::class, 'post_id', 'id');
    }
}
