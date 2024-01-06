<?php

namespace App\Models;

use Core\Model\Model;

class Story extends Model
{
    public function user()
    {
       return User::find($this->user_id);
    }

    public function category() {
        return Category::find($this->category_id);
    }
}
