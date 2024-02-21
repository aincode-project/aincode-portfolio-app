<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PortfolioCategory;
use App\Http\Controllers\Controller;
use App\DataTables\PortfolioCategoryDataTable;
use App\Models\PortfolioItem;

class PortfolioCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PortfolioCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.portfolio-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolio-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200|unique:portfolio_categories,name',
        ]);

        $portfolio_category = new PortfolioCategory();
        $portfolio_category->name = $request->name;
        $portfolio_category->slug = Str::slug($request->name);
        $portfolio_category->save();

        toastr()->success('Portfolio Category Created Successfully!', 'Congrats');
        return redirect()->route('admin.portfolio-category.index');
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
        $portfolio_category = PortfolioCategory::findOrFail($id);
        return view('admin.portfolio-category.edit', compact('portfolio_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:200|unique:portfolio_categories,name,'.$id,
        ]);

        $portfolio_category = PortfolioCategory::findOrFail($id);
        $portfolio_category->name = $request->name;
        $portfolio_category->slug = Str::slug($request->name);
        $portfolio_category->save();

        toastr()->success('Portfolio Category Updated Successfully!', 'Congrats');
        return redirect()->route('admin.portfolio-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portfolio_category = PortfolioCategory::findOrFail($id);
        $hasItem = PortfolioItem::where('portfolio_category_id', $portfolio_category->id)->count();
        if ($hasItem == 0) {
            $portfolio_category->delete();
            return true;
        }

        return response(['status' => 'error']);
    }
}
