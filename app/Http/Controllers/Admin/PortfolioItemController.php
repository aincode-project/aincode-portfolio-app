<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PortfolioItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use App\Models\PortfolioItem;
use Illuminate\Http\Request;

class PortfolioItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PortfolioItemDataTable $dataTable)
    {
        return $dataTable->render('admin.portfolio-item.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $portfolio_categories = PortfolioCategory::all();
        return view('admin.portfolio-item.create', compact('portfolio_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'max:5000'],
            'title' => ['required', 'max:200'],
            'description' => ['required'],
            'portfolio_category_id' => ['required', 'numeric'],
            'client' => ['max:200'],
            'date' => ['required'],
            'link' => ['url'],
        ]);

        $imagePath = handleUpload('image', 'portfolio');

        $portfolio_item = new PortfolioItem();
        $portfolio_item->image = $imagePath;
        $portfolio_item->title = $request->title;
        $portfolio_item->description = $request->description;
        $portfolio_item->portfolio_category_id = $request->portfolio_category_id;
        $portfolio_item->client = $request->client;
        $portfolio_item->link = $request->link;
        $portfolio_item->date = $request->date;
        $portfolio_item->save();

        toastr()->success('Portfolio Item Created Successfully!', 'Congrats');
        return redirect()->route('admin.portfolio-item.index');
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
        $portfolio_item = PortfolioItem::findOrFail($id);
        $portfolio_categories = PortfolioCategory::all();

        return view('admin.portfolio-item.edit', compact('portfolio_item', 'portfolio_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => ['image', 'max:5000'],
            'title' => ['required', 'max:200'],
            'description' => ['required'],
            'portfolio_category_id' => ['required', 'numeric'],
            'client' => ['max:200'],
            'date' => ['required'],
            'link' => ['url'],
        ]);

        $portfolio_item = PortfolioItem::findOrFail($id);
        $imagePath = handleUpload('image', 'portfolio', $portfolio_item);

        $portfolio_item->image = (!empty($imagePath) ? $imagePath : $portfolio_item->image);
        $portfolio_item->title = $request->title;
        $portfolio_item->description = $request->description;
        $portfolio_item->portfolio_category_id = $request->portfolio_category_id;
        $portfolio_item->client = $request->client;
        $portfolio_item->link = $request->link;
        $portfolio_item->date = $request->date;
        $portfolio_item->save();

        toastr()->success('Portfolio Item Updated Successfully!', 'Congrats');
        return redirect()->route('admin.portfolio-item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portfolio_item = PortfolioItem::findOrFail($id);
        handelDelete($portfolio_item->image);
        $portfolio_item->delete();
    }
}
