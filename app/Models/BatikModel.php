<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatikModel extends Model
{
    use HasFactory;
    protected $table = 'batik';
    public $timestamps = false;

    protected $fillable = ['id', 'nama_batik', 'kode', 'filosofi'];
}
