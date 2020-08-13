<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['body','user_id'];

    public function reviewer()
    {
        return $this->belongsTo('App\Reviewer');
    }

}
