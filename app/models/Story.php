<?php

namespace App\Models;

use Core\Model\Model;

class Story extends Model
{

    public const DEFAULT_IMAGE = "http://dl.fujifilm-x.com/global/products/cameras/gfx100s/sample-images/gfx100s_sample_02_eibw.jpg?_ga=2.203782416.1852843908.1704352190-106227692.1704352190";

    public function user()
    {
        return User::find($this->user_id);
    }

    public function category()
    {
        return Category::find($this->category_id);
    }

    public function getReadTime()
    {
        return static::readTime($this->content);
    }

    public static function readTime($content, $wpm = 200)
    {
        $wordCount = str_word_count(strip_tags($content));
        $readingTime = ceil($wordCount / $wpm);

        return $readingTime;
    }
}
