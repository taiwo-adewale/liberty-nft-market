<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;

class CategoryController extends Controller
{
  public function show(Category $category) {
    $cat_items = Item::getCategoryItems($category->id);
    $category = $category;

    return view('categories.show', compact(['cat_items', 'category']));
  }
}
