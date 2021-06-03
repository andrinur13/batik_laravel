<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaguyubanModel extends Model
{
    use HasFactory;
    protected $table = 'paguyuban';
    public $timestamps = false;

    protected $fillable = ['id', 'nama_paguyuban'];
}
