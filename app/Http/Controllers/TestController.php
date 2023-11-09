<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\Post;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // attach () => create
        //  sync ()  => update
        // detach () => delete

        $store = Store::find(2);
        $regionIds = [22,23,24 ];

        // $store->delete();
        $store->regions()->attach($regionIds   );

        return $store->regions;
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
