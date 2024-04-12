<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\PortfolioCategory;
use App\Models\PortfolioItem;
use App\Models\PortfolioSectionSetting;
use App\Models\Service;
use App\Models\SkillItem;
use App\Models\SkillSectionSetting;
use App\Models\TyperTitle;

class HomeController extends Controller
{
    public function index()
    {
        $hero = Hero::first();
        $typerTitles = TyperTitle::all();
        $services = Service::all();
        $about = About::first();
        $portfolioTitle = PortfolioSectionSetting::first();
        $portfolioCategories = PortfolioCategory::all();
        $portfolioItems = PortfolioItem::all();
        $skillTitle = SkillSectionSetting::first();
        $skillItems = SkillItem::all();
        return view('frontend.home', compact(
            'hero',
            'typerTitles',
            'services',
            'about',
            'portfolioTitle',
            'portfolioCategories',
            'portfolioItems',
            'skillTitle',
            'skillItems'
        ));
    }

    public function showPortfolio($id)
    {
        $portfolioItem = PortfolioItem::findOrFail($id);
        return view('frontend.portfolio-details', compact('portfolioItem'));
    }
}
