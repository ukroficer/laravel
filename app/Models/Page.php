<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    function tag()
    {
        return $this->belongsTo('Tag');
         
    }
}
