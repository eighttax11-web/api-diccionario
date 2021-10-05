<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function index()
    {
        return Category::all();
    }

    public function store($name)
    {
        $new_category['name'] = $name;

        return Category::create($new_category);
    }
}
