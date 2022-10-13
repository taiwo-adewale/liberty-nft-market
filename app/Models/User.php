<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */

  public function getRouteKeyName()
  {
    return 'slug';
  }

  protected $fillable = [
    'name',
    'email',
    'password',
    'slug',
    'image',
    'thumbnail',
    'username'
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function scopeGetAuthors($query) {
    return $query->join('author_stats', 'users.id', '=', 'author_stats.author_id')
    ->latest()
    ->simplePaginate(10);
  }

  public function scopeGetSingleAuthor($query, $id) {
    return $query->join('author_stats', 'users.id', '=', 'author_stats.author_id')
    ->where('users.id', '=', $id)
    ->first(['users.*', 'author_stats.*', 'users.id AS id']);
  }

  public function scopeGetTopSellers($query) {
    return $query->select('users.name', 'users.thumbnail', 'author_stats.sales')
    ->join('author_stats', 'users.id', '=', 'author_stats.author_id')
    ->orderBy('sales', 'desc')
    ->simplePaginate(12);
  }

}
