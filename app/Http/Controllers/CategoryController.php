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
}
