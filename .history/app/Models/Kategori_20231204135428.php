<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategoris';
    protected $fillable = ['nama_kategori'];

    public function Berita()
    {
        return $this->hasMany(Berita::class, 'kategori_id');
    }
}
