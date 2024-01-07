<?php

namespace App\Models\Additional;

use App\Models\Blog\BlogPosts;
use App\Models\Core\Affiliation;
use App\Models\Core\Country;
use App\Models\Core\Keywords\Keyword;
use App\Models\Posts\Post;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Club extends Model{
    protected $guarded = ['id'];

    public function countryRel(){
        return $this->hasOne(Country::class, 'id', 'country');
    }
    public function categoryRel(){
        return $this->hasOne(Keyword::class, 'id', 'category');
    }
    public function ownerRel(){
        return $this->hasOne(User::class, 'id', 'owner');
    }
    public function posts(){
        return $this->hasMany(Post::class, 'owner', 'id')->where('what', 1)->orderBy('id', 'DESC');
    }
    public function blogPosts(){
        return $this->hasMany(BlogPosts::class, 'owner', 'id')->where('category', 1)->orderBy('id', 'DESC');
    }
}
