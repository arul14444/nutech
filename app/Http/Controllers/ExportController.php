<?php

namespace App\Http\Controllers;

use App\Exports\ProdukExport;
use App\Models\ProdukModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromQuery;
use App\Repository\ProdukRepository;

class ExportController extends Controller
{
protected $produkRepository;
public function __construct(
    ProdukRepository $produkRepository
    )
{
    $this->produkRepository = $produkRepository;
}
 public function exportExcel(Request $request)
 {
    $search = $request->search ?? '';
    $kd_kategori = $request->kd_kategori ?? '';
    return Excel::download(new ProdukExport($search, $kd_kategori), 'produk.xlsx');
 }   

}
