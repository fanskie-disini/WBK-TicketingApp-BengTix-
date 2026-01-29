<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    // Tambahkan baris ini agar Laravel tahu field mana yang boleh diisi
    protected $fillable = ['nama_lokasi']; 
}