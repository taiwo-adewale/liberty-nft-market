<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;

class HomeController extends Controller
{

  public function index() {
    $categories = Category::all();
    $items = Item::getItemsHome();

    return view('index', ['categories' => $categories, 'items' => $items]);
  }

}
