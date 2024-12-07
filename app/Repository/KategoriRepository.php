<?php

namespace App\Repository;

use App\Models\KategoriModel;

class KategoriRepository
{
    protected $kategoriModel;

    public function __construct(
        KategoriModel $kategoriModel)
    {
        $this->kategoriModel = $kategoriModel;
    }

    public function getAll()
    {
        return $this->kategoriModel->all();
    }

    public function findByCode($code)
    {
        return $this->kategoriModel->where('kd_kategori', $code)->first();
    }
}