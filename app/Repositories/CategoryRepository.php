<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function index()
    {
        return Category::all();
    }

    public function store($name, $url)
    {
        $new_category['name'] = $name;
        $new_category['url'] = $url;

        return Category::create($new_category);
    }

    public function find($id)
    {
        return Category::where('id', '=', $id)->first();
    }

    public function update($id, $name, $url)
    {
        $category = $this->find($id);

        if (empty($category)) {
            return;
        }

        $category->name = $name;
        $category->url = $url;
        $category->save();
        return $category;
    }

    public function destroy($id)
    {
        $category = $this->find($id);

        if (empty($category)) {
            return;
        }

        return $category->delete();
    }

    public function search($search)
    {
        return Category::where('name', 'like', '%' . $search . '%')->get();
    }
}
