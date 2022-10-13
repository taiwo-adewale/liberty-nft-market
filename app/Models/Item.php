<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  use HasFactory;

  public function getRouteKeyName()
  {
    return 'slug';
  }

  protected $fillable = ['name', 'description', 'slug', 'image', 'price', 'author_id', 'cat_id'];

  public function scopeGetAuthorItems($query, $id) {
    return $query->join('categories', 'categories.id', '=', 'items.cat_id')
    ->where('items.author_id', '=', $id)
    ->latest()
    ->get(['items.*', 'categories.id AS cat_id', 'categories.cat_name AS cat_name']);
  }

  public function scopeGetItems($query) {
    return $query->select('items.*', 'items.slug AS slug', 'users.thumbnail AS author_thumbnail', 'users.name AS author_name', 'users.username AS author_username', 'users.slug AS author_slug', 'categories.cat_name AS cat_name')
    ->join('users', 'users.id', '=', 'items.author_id')
    ->join('categories', 'categories.id', '=', 'items.cat_id')
    ->latest();
  }

  public function scopeGetSingleItem($query, $id) {
    return $query->join('users', 'users.id', '=', 'items.author_id')
    ->join('categories', 'categories.id', '=', 'items.cat_id')
    ->where('items.id', '=', $id)
    ->first(['items.*', 'users.name AS author_name', 'users.username AS author_username', 'users.slug AS author_slug', 'users.thumbnail AS author_thumbnail', 'categories.cat_name AS cat_name', 'categories.cat_slug AS cat_slug']);
  }

  public function scopeGetItemsHome($query) {
    return $query->join('categories', 'categories.id', '=', 'items.cat_id')
    ->join('users', 'users.id', '=', 'items.author_id')
    ->latest()
    ->get(['items.*', 'categories.*', 'users.slug AS author_slug', 'users.name AS author_name', 'users.username AS author_username', 'users.thumbnail AS author_thumbnail', 'items.slug AS slug']);
  }

  public function scopeFilterItems($query, array $filters) {
    if($filters['search'] ?? false) {
      $query->where('items.name', 'LIKE', '%' . $filters['search'] . '%');
    }

    if($filters['category'] ?? false) {
      if($filters['category'] == 'all') {
        $query->where('items.name', 'LIKE', '%' . $filters['search'] . '%');
      } else {
        $query->where('items.name', 'LIKE', '%' . $filters['search'] . '%')
        ->where('items.cat_id', '=', $filters['category']);
      }
    }
  }

  public function scopeGetCategoryItems($query, $id) {
    return $query->select('items.*', 'categories.*', 'categories.id AS cat_id', 'users.thumbnail AS author_thumbnail')
    ->join('categories','items.cat_id', '=', 'categories.id')
    ->join('users', 'items.author_id', '=', 'users.id')
    ->where('items.cat_id', '=', $id)
    ->get();
  }
}
