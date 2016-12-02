<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $fillable=['content'];

    public function article()
    {
        return $this->belongsTo('App\Model\Article');
    }

    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

    public static function getMessage($id)
    {
        return self::where('article_id', $id)->with('user')->latest()->paginate(4);
    }

}
