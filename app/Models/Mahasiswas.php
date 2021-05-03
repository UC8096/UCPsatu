<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswas extends Model
{
    protected $table = 'mahasiswas';

    protected $fillable = ['nama', 'nim', 'alamat'];
}
