<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StarFortune extends Model
{
    protected $table = 'star_fortune';
    protected $guarded = [];
    protected $dateFormat = 'Y-m-d H:i:s';
}
