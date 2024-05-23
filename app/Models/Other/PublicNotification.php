<?php

namespace App\Models\Other;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PublicNotification extends Model{
    protected $guarded = ['id'];
    protected $table = '__public_notification';

    public function dateFrom(){
        return Carbon::parse($this->from)->format('d.m.Y');
    }
    public function dateTo(){
        return Carbon::parse($this->to)->format('d.m.Y');
    }
}
