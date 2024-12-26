<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\UlasanModel;

class DetailController extends Controller
{
    public function detail(Request $request)
    {
        $id = $request->id;
        $ulasan = UlasanModel::where('product_id', $request->id)->get();
        $categories = Category::all();
        $product = Product::getSingle($id);
        $rating = UlasanModel::where('product_id', $request->id)->avg('rating');
        $rata = number_format($rating, 1);

        $totalCount = UlasanModel::where('product_id', $request->id)->count();

        // Total data dengan rating 4 atau 5
        $fourAndFiveCount = UlasanModel::where('product_id', $request->id)
            ->whereIn('rating', [4, 5])
            ->count();

        // Menghitung persentase
        $percentage = ($totalCount > 0) ? ($fourAndFiveCount / $totalCount) * 100 : 0;

        // Memformat hasil menjadi desimal dengan satu angka di belakang koma
        $persen = number_format($percentage, 0);

    return view('landing.detail-page', compact('product', 'categories','ulasan','rata', 'persen', 'totalCount'));
    }
}
