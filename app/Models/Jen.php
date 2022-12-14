<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jen extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function act()
    {
        return $this->hasMany(Act::class);
    }
}
