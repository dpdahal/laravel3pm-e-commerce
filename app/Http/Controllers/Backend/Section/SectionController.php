<?php

namespace App\Http\Controllers\Backend\Section;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    private $pagePath = "backend.pages.";

    public function index()
    {
        $sectionData = Section::all();
        return view($this->pagePath . 'section.index', compact('sectionData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view($this->pagePath . 'section.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:sections|min:3|max:255',
        ]);
        Section::create($validatedData);
        return redirect()->route('manage-section.index')->with('success', 'Section created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $section = Section::find($id);
        return view($this->pagePath . 'section.show', compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $section = Section::find($id);
        return view($this->pagePath . 'section.update', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:sections,name,' . $id . '|min:3|max:255',
        ]);
        Section::whereId($id)->update($validatedData);
        return redirect()->route('manage-section.index')->with('success', 'Section updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $findCategory = Category::where('section_id', $id)->count();
        if ($findCategory > 0) {
            return redirect()->route('manage-section.index')->with('error', 'Section cannot be deleted as it has categories');
        }else{
            Section::whereId($id)->delete();
            return redirect()->route('manage-section.index')->with('success', 'Section deleted successfully');
        }
    }
}
