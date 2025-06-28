<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tag';
    protected $fillable = ['nama_tag'];

    public function berita()
    {
        return $this->belongsToMany(Berita::class, 'berita_tag');
    }
}
