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

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $name = $request->input('name');
        $url = $request->input('url');
        $category_id = $request->input('category_id');
        return response()->json($this->word_repository->store($name, $url, $category_id));
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        return response()->json($this->word_repository->show($id));
    }

    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $name = $request->input('name');
        $url = $request->input('url');
        $category_id = $request->input('category_id');
        return response()->json($this->word_repository->update($id, $name, $url, $category_id));
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        return response()->json($this->word_repository->destroy($id));
    }

    public function search(Request $request): \Illuminate\Http\JsonResponse
    {
        $search = $request->input('search');
        return response()->json($this->word_repository->search($search));
    }

    public function getWordsByCategory($id): \Illuminate\Http\JsonResponse
    {
        return response()->json($this->word_repository->getWordsByCategory($id));
    }
}
