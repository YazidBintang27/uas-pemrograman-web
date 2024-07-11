<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_buku extends Model
{
    use HasFactory;
    protected $fillable = ['judul', 'penulis', 'jumlah'];
    protected $table = 'data_buku';
    public $timestamps = false;
}
