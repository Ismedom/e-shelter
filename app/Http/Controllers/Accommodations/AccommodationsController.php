<?php

namespace App\Http\Controllers\Accommodations;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccommodationsRequest;
use App\Models\Accommodation;
use Illuminate\Http\Request;

class AccommodationsController extends Controller
{
    public $accommodation;

    public function __construct(){
        $this->accommodation = new \App\Actions\AccommodationAction();
    }
      /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->user()->isHotelOwner()){
            $accommodations = Accommodation::where('business_owner_id', $request->user()->id)->get();
        }else{
            $accommodations = Accommodation::where('business_owner_id', $request->user()->current_owner_id)->get();
        }
        return view('accommodations.index', compact('accommodations'));
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
       if(empty($accommodationm)) return redirect()->back()->with('error', 'Accommodation creation failed.');
       return redirect()->route('accommodations.index')->with('success', 'Accommodation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function info(Request $request, string $id)
    {
        $this->ownAccess($request->user(), $id);
        $accommodation = Accommodation::find($id);
        
       return view('accommodations.info', compact('accommodation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {   
        $this->ownAccess($request->user(), $id);
        $accommodation = Accommodation::find($id);
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
       $this->ownAccess($request->user(), $id);
       return view('');
    }

    private function ownAccess($user, $id){
        if($user->isHotelOwner()){
            $accommodationId = Accommodation::select('id')->where('business_owner_id', $user->id)->get();
        }else{
            $accommodationId = Accommodation::select('id')->where('business_owner_id', $user->current_owner_id)->get();
        }
        if($accommodationId->isEmpty()) return redirect()->back()->with('error', 'Accommodation not found.');
        $accommodationId = $accommodationId->pluck('id')->toArray();
        if(!in_array($id, $accommodationId)){
            return abort(403, 'Unauthorized action.');
        }
    }
}
