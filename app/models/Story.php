<?php

namespace App\Models;

use Core\Model\Model;

class Story extends Model
{

    public const DEFAULT_IMAGE = "https://cdn.pixabay.com/photo/2016/11/20/09/06/laptop-1842297_1280.jpg";
    public const PAGE_SIZE = 10;

    public function user()
    {
        return User::find($this->user_id);
    }

    public function category()
    {
        return Category::find($this->category_id);
    }

    public static function fetchFromParams($data)
    {

        $options = [
            "limit" => static::PAGE_SIZE,
            "orderBy" => "created_at",
            "sortDir" => "DESC",
            "offset" => 0
        ];

        $conditions = [];

        if (count($data) == 0) {
            return [static::fetch($conditions, $options), [
                "category" => "all",
                "sortBy" => "DESC",
                "page" => 1,
                "search" => "",
            ]];
        }

        $category = $data["category"];
        $sortBy = $data["sortBy"];
        $page = $data["page"];
        $search = $data["search"];

        if ($sortBy != "ASC" && $sortBy != "DESC") {
            $sortBy = "ASC";
        }

        if ($category != "all") {
            $conditions["category_id"] = $category;
        }
        $conditions["title"] = ["LIKE", "%$search%"];

        $options["sortDir"] = $sortBy;

        if($page < 1) {
            $page = 1;
        }
        $options["offset"] = ($page - 1) * static::PAGE_SIZE;

        return [static::fetch($conditions, $options), [
            "category" => $category,
            "sortBy" => $sortBy,
            "page" => $page,
            "search" => $search,
        ]];
    }

    public static function fetch($conditions, $options)
    {
        return static::allWhere($conditions, $options);
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
