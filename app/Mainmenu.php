<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mainmenu extends Model
{
    protected $fillable = [
        'banglaname', 'englishname','order', 'display',
    ];

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
