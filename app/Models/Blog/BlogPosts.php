<?php

namespace App\Models\Blog;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPosts extends Model{
    use SoftDeletes;
    protected static $_months = ['Januar', 'Februar', 'Mart', 'April', 'Maj', 'Juni', 'Juli', 'August', 'Septembar', 'Oktobar', 'Novembar', 'Decembar'];
    protected static $_days   = ['Pon', 'Uto', 'Sri', 'Čet', 'Pet', 'Sub', 'Ned'];

    protected $table = 'blog_posts';
    protected $guarded = ['id'];

    public function createdAt(){
        try{
            $date = Carbon::parse($this->created_at);
            return ($date->format('d')).'. '.self::$_months[$date->month - 1].' '.($date->format('Y')).' - '.($date->format('H:i')).'h';
        }catch (\Exception $e){}
    }
}
