<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Section;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $pagePath = "backend.pages.";

    public function index()
    {
        $categoryData = Category::all();
        return view($this->pagePath . 'category.index', compact('categoryData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sectionData = Section::all();
        $parentCategory = Category::where('parent_id', null)->get();
        $data['sectionData'] = $sectionData;
        $data['categoryData'] = $parentCategory;
        return view($this->pagePath . 'category.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'section_id' => 'required',
            'category_name' => 'required',
            'slug' => 'required|unique:categories'
        ]);
        $validation['parent_id'] = $request->parent_id ?? null;
        Category::create($validation);
        return redirect()->route('manage-category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
