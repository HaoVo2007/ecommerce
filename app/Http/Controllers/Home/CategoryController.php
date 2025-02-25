<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getBrand() {

        $data = Category::where('parent_id', 0)->get();
        $appUrl = config('app.url');

        foreach ($data as $item) {
            $item->url = $appUrl . "/home/category/" . $item->id;
        }

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);

    }
}
