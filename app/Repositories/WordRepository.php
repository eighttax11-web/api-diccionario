<?php

namespace App\Repositories;

use App\Models\Word;

class WordRepository
{
    public function index()
    {
        return Word::with('category')->get();
    }

    public function store($name, $url, $category_id)
    {
        $new_word['name'] = $name;
        $new_word['url'] = $url;
        $new_word['category_id'] = $category_id;

        return Word::create($new_word);
    }

    public function find($id)
    {
        return Word::where('id', '=', $id)->first();
    }

    public function show($id)
    {
        $post = Word::find($id);

        if (is_object($post)) {

            return Word::find($id)->load('category');
        }

        return;

    }

    public function update($id, $name, $url, $category_id)
    {
        $word = $this->find($id);

        if (empty($word)) {
            return;
        }

        $word->name = $name;
        $word->url = $url;
        $word->category_id = $category_id;
        $word->save();
        return $word;
    }

    public function destroy($id)
    {
        $word = $this->find($id);

        if (empty($word)) {
            return;
        }

        return $word->delete();
    }

    public function search($search)
    {
        return Word::where('name', 'like', '%' . $search . '%')->get();
    }

    public function getWordsByCategory($id)
    {
        return Word::where('category_id', $id)->get();
    }
}
