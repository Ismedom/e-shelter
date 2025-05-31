<?php

namespace App\Http\Controllers\Accommodations;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccommodationsRequest;
use App\Models\Accommodation;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class AccommodationsController extends Controller
{
    use AuthorizesRequests;
    public $accommodation;
    public $userAccommodation;

    public function __construct(){
        $this->accommodation = app(\App\Actions\AccommodationAction::class);
        $this->userAccommodation = app(\App\Actions\UserAccommodation::class);
    }
      /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Accommodation $accommodation)
    {
        if($request->user()->isHotelOwner()) $accommodations = Accommodation::where('business_owner_id', $request->user()->id)->get();
        else $accommodations = Accommodation::where('business_owner_id', $request->user()->current_owner_id)->get();
        return view('accommodations.index', compact('accommodations' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accommodations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccommodationsRequest $request)
    {
        $business_owner_id = null;
        if($request->user()->isHotelOwner()){
            $business_owner_id = $request->user()->id;
        }else {
            $business_owner_id = $request->user()->current_owner_id;
        }
        $user_owner = \App\Models\User::find($business_owner_id);
        $business_information = $user_owner->bussinessInformation()->get();
        if($business_information->isEmpty()){
            return redirect()->back()->with('error', 'Business information not found.');
        }
       $accommodationm = $this->accommodation->create([
        ...$request->validated(), 
        'business_owner_id'       => $business_owner_id,
        'business_information_id' => $business_information[0]->id??null,
        ]);
        $this->userAccommodation->create([
            'user_id'          => $business_owner_id,
            'accommodation_id' => $accommodationm->id,
        ]);
       if(empty($accommodationm)) return redirect()->back()->with('error', 'Accommodation creation failed.');
       return redirect()->route('accommodations.index')->with('success', 'Accommodation created successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show(Request $request,Accommodation $accommodation)
    {
        $this->authorize('view', $accommodation);
       return view('accommodations.info', compact('accommodation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Accommodation $accommodation)
    {   
        $this->authorize('view', $accommodation);
        if(empty($accommodation)) return redirect()->back()->with('error', 'Accommodation not found.');
        return view('accommodations.edit', compact('accommodation'));
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
    public function destroy(Request $request,string $id)
    {
       return view('');
    }

}
