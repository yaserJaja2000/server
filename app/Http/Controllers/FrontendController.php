<?php

namespace App\Http\Controllers;

use App\Models\CarouselHeroSection;
use App\Models\Country;
use App\Models\Deal;
use App\Models\Destination;
use App\Models\Offer;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = CarouselHeroSection::all();
        $deals = Deal::all();
        $offers1 = Offer::all()->where('category', 1);
        $offers2 = Offer::all()->where('category', 2);
        $offers3 = Offer::all()->where('category', 3);
        $countries = Country::all();
        return view('index', compact(
            'lists', 'deals',
            'offers1', 'offers2', 'offers3',
            'countries'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
