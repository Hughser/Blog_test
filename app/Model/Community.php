<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    protected $table = 'communitys';

    protected $fillable = [
      'user_id', 'provider_user_id', 'provider',
  ];
}
