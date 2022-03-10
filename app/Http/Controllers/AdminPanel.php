<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class AdminPanel extends Controller
{
    public function AddCategory(Request $request)
    {
        $description = '';
        if ($request->categoryDesc) {
            $description = $request->categoryDesc;
        } else {
            $description = 'N/A';
        };
        Category::create([
            'name' => $request->categoryName,
            'description' => $description,
        ]);
        return(redirect('/admin'));
    }
}
