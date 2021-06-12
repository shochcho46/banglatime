<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'mainmenu_id','headline','headnews','description','count','picture','journalist','count','user_id',
    ];

    protected $casts = ['picture' => 'array'];


    public function mainmenu()
    {
        return $this->belongsTo(Mainmenu::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
