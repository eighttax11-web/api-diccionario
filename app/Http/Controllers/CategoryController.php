<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    protected $category_repository;
    public function __construct(CategoryRepository $category)
    {
        $this->category_repository = $category;
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json($this->category_repository->index());
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $name = $request->input('name');
        $url = $request->input('url');
        return response()->json($this->category_repository->store($name, $url));
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        return response()->json($this->category_repository->find($id));
    }

    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $name = $request->input('name');
        $url = $request->input('url');
        return response()->json($this->category_repository->update($id, $name, $url));
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        return response()->json($this->category_repository->destroy($id));
    }

    public function search(Request $request): \Illuminate\Http\JsonResponse
    {
        $search = $request->input('search');
        return response()->json($this->category_repository->search($search));
    }
}
