<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\WordRepository;

class WordController extends Controller
{
    protected $word_repository;
    public function __construct(WordRepository $word)
    {
        $this->word_repository = $word;
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json($this->word_repository->index());
    }
}
