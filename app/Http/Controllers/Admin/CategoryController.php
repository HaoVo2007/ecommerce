<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function viewCategory()
    {
        return view('admin.categories.index');
    }

    public function getCategory()
    {

        $data = Category::where('parent_id', 0)->with('children.children')->paginate(10);

        return response()->json([
            'data' => $data,
            'status' => 'success',
        ]);
    }

    public function loadCategory()
    {
        $categories = Category::where('parent_id', 0)
            ->with('children.children') 
            ->get();

        // Gọi hàm đệ quy để tạo mảng danh mục cha - con nhiều cấp
        $formattedCategories = $this->formatCategories($categories);

        return response()->json($formattedCategories);
    }

    /**
     * Hàm đệ quy để định dạng danh mục theo nhiều cấp
     */
    private function formatCategories($categories, $prefix = '')
    {
        $formatted = [];

        foreach ($categories as $category) {
            // Thêm danh mục hiện tại
            $formatted[] = [
                'id' => $category->id,
                'text' => $prefix . $category->name,
            ];

            // Kiểm tra nếu có con thì tiếp tục đệ quy
            if ($category->children->count()) {
                $formatted = array_merge($formatted, $this->formatCategories($category->children, $prefix . '-- '));
            }
        }

        return $formatted;
    }



    public function addCategory(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Please enter complete information',
                'error' => $validator->errors(),
            ], 422);
        }

        $name = $request->name;
        $parentId = $request->parentId;

        if ($parentId) {
            $data = Category::create([
                'name' => $name,
                'parent_id' => $parentId,
            ]); 
        } else {
            $data = Category::create([
                'name' => $name,
                'parent_id' => 0,
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Add category successfully',
            'data' => $data
        ]);
    }
}
