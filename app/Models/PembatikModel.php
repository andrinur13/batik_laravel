<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembatikModel extends Model
{
    use HasFactory;
    protected $table = 'pembatik';
    public $timestamps = false;

    protected $fillable = ['id', 'nama_pembatik', 'kode_paguyuban', 'kode_pembatik', 'status'];
}
