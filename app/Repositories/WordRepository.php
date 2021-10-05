<?php

namespace App\Repositories;

use App\Models\Word;

class WordRepository
{
    public function index()
    {
        return Word::with('category')->get();
    }
}
