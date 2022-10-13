<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorStat extends Model
{
  use HasFactory;

  public $timestamps = false;
  
  protected $table = 'author_stats';

  protected $fillable = ['author_id', 'likes', 'waves', 'sales', 'followers'];
}
