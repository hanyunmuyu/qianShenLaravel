<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        return view('admin.category.index');
    }
    public function list(Request $request)
    {
        $categoryName = $request->get('categoryName');
        $categoryList = $this->categoryRepository->getCategoryList($categoryName);
        return $this->success($categoryList->toArray());
    }
}
