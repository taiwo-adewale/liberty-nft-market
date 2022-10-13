<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Http\Requests\ItemStoreRequest;

class ItemController extends Controller
{

  public function index() {
    $items = Item::getItems()->get();
    $filtItems = Item::getItems()->filterItems(request(['search', 'category']))->get();
    $categories = Category::all();
    $top_sellers = User::getTopSellers();

    return view('items.index', ['items' => $items, 'categories' => $categories, 'filtItems' => $filtItems, 'top_sellers' => $top_sellers]);
  }

  public function show(Item $item) {
    $item = Item::getSingleItem($item->id);

    return view('items.show', ['item' => $item]);
  }

  public function create() {
    $categories = Category::all();
    $author = Auth::user();

    return view('items.create', compact(['categories', 'author']));
  }

  public function store(ItemStoreRequest $request) {
    $formData = $request->validated();

    $cat_id = Category::where('cat_name', '=', $request->cat_id)->first();

    $formData['cat_id'] = $cat_id->id;
    $formData['author_id'] = auth()->id();
    $formData['slug'] = str_replace(' ', '_', strtolower($formData['name']));

    if($request->hasFile('image')) {
      $filenameWithExtension = $request->file('image')->getClientOriginalName();
      $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
      $extension = $request->file('image')->getClientOriginalExtension();
      $filenameToStore = $filename . '_' . time() . '.' . $extension;

      $request->file('image')->storeAs('public/itemImages', $filenameToStore);

      $mainPath = public_path('storage/itemImages/' . $filenameToStore);
      Image::make($mainPath)->resize(450, 450)->save($mainPath);

      $formData['image'] = 'itemImages/' . $filenameToStore;
    }

    Item::create($formData);

    return redirect('/')->with('message', 'Item created successfully');
  }
}
