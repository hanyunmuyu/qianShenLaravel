<?php


namespace App\Repositories\Admin;


use App\Models\Category;

class CategoryRepository
{
    public function getCategoryList($categoryName)
    {
        return Category::orderby('id', 'desc')
            ->where(function ($q) use ($categoryName) {
                if ($categoryName) {
                    $q->where('category_name', 'like', "%$categoryName%");
                }
            })
            ->paginate();
    }
}
