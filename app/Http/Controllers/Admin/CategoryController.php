<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function viewCategory() {
        return view('admin.categories.index');
    }

    public function getCategory(Request $request) {

        if ($request->keyWord) {
            $data = Category::where('name', 'LIKE', '%' . $request->keyWord . '%')->paginate(5);
        } else {
            $data = Category::where('parent_id', 0)->with('children')->paginate(5);
        }
        return response()->json([
            'data' => $data,
            'status' => 'success',
        ]);
    }
    
    public function loadCategory() {
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
    private function formatCategories($categories, $prefix = '') {
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



    public function addCategory(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => trans('message.enter-infor'),
                'error' => $validator->errors(),
            ], 422);
        }

        if ($request->hasFile('imageCategory') && $request->file('imageCategory')->isValid()) {
            $mainImagePath = $request->file('imageCategory')->store('categories', 'public');
        } else {
            $mainImagePath = NULL;
        }

        $name = $request->name;
        
        $parentId = $request->parentId;

        if ($parentId != 'null') {
            $data = Category::create([
                'name' => $name,
                'parent_id' => $parentId,
                'image_url' => $mainImagePath,
            ]); 
        } else {
            $data = Category::create([
                'name' => $name,
                'parent_id' => 0,
                'image_url' => $mainImagePath,
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => trans('message.add-category-success'),
            'data' => $data
        ]);
    }

    public function editCategory($id) {

        $data = Category::with('parent')->findOrFail($id);

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

    public function updateCategory(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => trans('message.enter-infor'),
                'error' => $validator->errors(),
            ], 422);
        }

        $name = $request->name;
        $parentId = $request->parentId;
        $id = $request->id;

        $category = Category::findOrFail($id);
        
        if ($request->hasFile('imageCategory')) {
            if ($category->image_url) {

                $oldMainImagePath = public_path('storage/' . $category->image_url);

                if (file_exists($oldMainImagePath)) {
                    unlink($oldMainImagePath);
                }
            }
            $mainImagePath = $request->file('imageCategory')->store('categories', 'public');

            if ($parentId == 'null') {

                $data = $category->update([
                    'name' => $name,
                    'parent_id' => 0,
                    'image_url' => $mainImagePath,
                ]);

            } else {

                $data = $category->update([
                    'name' => $name,
                    'parent_id' => $parentId,
                    'image_url' => $mainImagePath,
                ]);

            }

        } else {
            if ($category->image_url) {

                $oldMainImagePath = public_path('storage/' . $category->image_url);

                if (file_exists($oldMainImagePath)) {
                    unlink($oldMainImagePath);
                }                
            }

                        if ($parentId == 'null') {

                $data = $category->update([
                    'name' => $name,
                    'parent_id' => 0,
                    'image_url' => NULL,
                ]);

            } else {

                $data = $category->update([
                    'name' => $name,
                    'parent_id' => $parentId,
                    'image_url' => NULL,
                ]);
                 
            }
        }

        return response()->json([
            'status' => 'success',
            'message' => trans('message.add-category-success'),
            'data' => $data
        ]);
    }

    public function deleteCategory($id) {

        $data = Category::findOrFail($id);

        if ($data) {

            $this->deleteChildren($data);

            $data->delete();

            return response()->json([
                'status' => 'success',
                'message' => trans('message.delete-category-success')
            ]);

        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Not found model'
            ]);
        }
    }

    private function deleteChildren($category) {
        foreach($category->children as $child) {
            $this->deleteChildren($child);
            $child->delete();
        }
    }

    public function deleteAllCategory(Request $request) {

        $checkedIds = $request->checkedIds;

        foreach($checkedIds as $item) {

            $category = Category::find($item);

            if ($category) {

                $this->deleteChildren($category);

                $category->delete();

            } else {
                continue;   
            }

        }

        return response()->json([
            'status' => 'success',
            'message' => trans('message.delete-category-success')
        ]);
        
    }

}
