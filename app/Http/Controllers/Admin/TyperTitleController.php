<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TyperTitleDataTable;
use App\Http\Controllers\Controller;
use App\Models\TyperTitle;
use Illuminate\Http\Request;

class TyperTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TyperTitleDataTable $dataTable)
    {
        return $dataTable->render('admin.typer-title.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.typer-title.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:200']
        ]);

        $createTitle = new TyperTitle();
        $createTitle->title = $request->title;
        $createTitle->save();

        toastr()->success('Created Successfully', 'Congrats');
        return redirect()->route('admin.typer-title.index');
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
        $typerTitle = TyperTitle::findOrFail($id);
        return view('admin.typer-title.edit', compact('typerTitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'max:200']
        ]);

        $editTitle = TyperTitle::findOrFail($id);
        $editTitle->title = $request->title;
        $editTitle->save();

        toastr()->success('Updated Successfully', 'Congrats');
        return redirect()->route('admin.typer-title.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteTitle = TyperTitle::findOrFail($id);
        $deleteTitle->delete();
    }
}
