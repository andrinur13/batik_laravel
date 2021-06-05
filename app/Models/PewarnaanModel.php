<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PewarnaanModel extends Model
{
    use HasFactory;
    protected $table = 'pewarnaan';
    public $timestamps = false;

    protected $fillable = ['id', 'pelaku', 'kode'];
}
