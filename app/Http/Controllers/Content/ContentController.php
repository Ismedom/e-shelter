<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display the main content management page.
     */
    public function index()
    {
        return view('contents.hero');
    }

    /**
     * Display the hero section configuration page.
     */
    public function hero()
    {
        return view('contents.hero');
    }

    /**
     * Display the province section configuration page.
     */
    public function province()
    {
        return view('contents.province');
    }

    /**
     * Display the host services section configuration page.
     */
    public function host()
    {
        return view('contents.host');
    }

    /**
     * Display the benefits section configuration page.
     */
    public function benefits()
    {
        return view('contents.benefits');
    }

    /**
     * Display the features section configuration page.
     */
    public function features()
    {
        return view('contents.features');
    }

    /**
     * Display the FAQ section configuration page.
     */
    public function faq()
    {
        return view('contents.faq');
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
