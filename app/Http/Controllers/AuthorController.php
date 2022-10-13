<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\AuthorStat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cookie;
use App\Http\Requests\UserStoreRequest;

class AuthorController extends Controller
{
  public function index() {
    $authors = User::getAuthors();

    if($authors->isEmpty()) {
      abort(404);
    }

    return view('authors.index', ['authors' => $authors]);
  }


  public function show(User $author) {
    $author_items = Item::getAuthorItems($author->id);
    $author = User::getSingleAuthor($author->id);
      
    return view('authors.show', ['author_items' => $author_items ,'author' => $author]);
  }


  public function create() {
    return view('authors.create');
  }


  public function store(UserStoreRequest $request) {
    $formData = $request->validated();

    $formData['password'] = bcrypt($formData['password']);
    $formData['slug'] = str_replace([' ', '.'], ['_', ''], strtolower($formData['name']));
    $formData['username'] = '@' . str_replace(['@','.'], '', $formData['username']);

    if($request->hasFile('image')) {
      $filenameWithExtension = $request->file('image')->getClientOriginalName();
      $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
      $extension = $request->file('image')->getClientOriginalExtension();
      $filenameToStore = $filename . '_' . time() . '.' . $extension;

      $request->file('image')->storeAs('public/authorImages', $filenameToStore);
      $request->file('image')->storeAs('public/authorImages/thumbnail', $filenameToStore);

      $thumbnailPath = public_path('storage/authorImages/thumbnail/' . $filenameToStore);
      Image::make($thumbnailPath)->resize(50, 50)->save($thumbnailPath);

      $mainPath = public_path('storage/authorImages/' . $filenameToStore);
      Image::make($mainPath)->resize(200, 200)->save($mainPath);

      $formData['image'] = 'authorImages/' . $filenameToStore;
      $formData['thumbnail'] = 'authorImages/thumbnail/' . $filenameToStore;
    }

    DB::transaction(function () use($formData) {
      $user = User::create($formData);

      auth()->login($user);

      AuthorStat::create([
        'author_id' => auth()->id(),
        'likes' => rand(1,100),
        'waves' => rand(1,100),
        'followers' => rand(1,500),
        'sales' => rand(10,100)/10  
      ]);

    });

    return redirect('/')->with('message', 'Author successfully created');
  }
  

  public function login() {
    return view('authors.login');
  }


  public function authenticate(Request $request) {
    $formFields = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    if($request->has('remember_me')) {
      Cookie::queue('useremail', $request->email, 14400);
      Cookie::queue('userpassword', $request->password, 14400);
    } 

    if(auth()->attempt($formFields)) {
      $request->session()->regenerate();

      return redirect('/')->with('message', 'You are now logged in');
    }

    return back()->withErrors(['password' => 'Invalid email or password'])->onlyInput('email');
  }


  public function logout(Request $request) {
    auth()->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('message', 'You have been logged out!');
  }

  public function forgot() {
    return view('authors.password-reset');
  }

  public function reset(Request $request) {
    //check if email is in database
  }
}

