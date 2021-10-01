<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data = Category::all();

        if ($data->count() > 0) {
            return ResponseFormatter::success($data, 'Berhasil mendapatkan data');
        }

        return ResponseFormatter::error('Belum ada data');
    }
}
