<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRCodeModel extends Model
{
    use HasFactory;
    protected $table = 'qrcode';
    public $timestamps = false;

    protected $fillable = ['id', 'qrcode', 'path_qrcode', 'path_img'];

}
