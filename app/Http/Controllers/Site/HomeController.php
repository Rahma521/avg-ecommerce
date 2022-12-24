<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ItemType;
use App\Models\Offer;
use App\Models\Slider;
use App\Models\Contact;

use Illuminate\Support\Facades\DB;
use Cart;
use App\Models\ItemRate;
use App\Models\ItemImage;
use App\Models\Page;




class HomeController extends Controller
{
    public function index()
    {

        $Featureds = Item::where('is_special', '=', 1)->get();
        // $L_items = Item::latest()->take(10)->get();
        $Arrivals = Item::orderBy('id', 'desc')->take(10)->get();
        $trends = Item::orderBy('view', 'desc')->take(5)->get();

        $sellars = Item::join('invoices_details', 'invoices_details.item_id', '=', 'items.id')
            ->select('items.*', DB::raw('SUM(invoices_details.quantity) as SoldQuantity'))
            ->groupBy('items.id')
            ->orderBy('SoldQuantity', 'desc')->take(5)
            ->get();

        $SpecialOffers = Item::where('withDiscount', '=', 1)->get();
        // dd($SpecialOffers);

        $sliders = Slider::all();

        $categories = ItemType::get();

        $offers = Offer::all();

        $blogs = Page::all();

        return view('V1.index', compact('sliders', 'Featureds', 'Arrivals', 'sellars', 'categories', 'trends', 'SpecialOffers', 'offers','blogs'));
    }


}
