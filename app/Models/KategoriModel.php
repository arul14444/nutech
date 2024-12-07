<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id';
    protected $hidden = ['created_at', 'updated_at', 'id'];
    public $timestamps = false;
}
