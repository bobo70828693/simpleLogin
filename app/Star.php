<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    protected $table = 'star';
    protected $guarded = [];
    protected $dateFormat = 'Y-m-d H:i:s';

    public function starFortune()
    {
        return $this->hasMany(StarFortune::class);
    }
}
