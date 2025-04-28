<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct()
    {
        $this->userRepo = app(\App\Repositories\UserRepository::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rawFilter = $request->query('search', '');
        $users = $this->userRepo
                ->filterUser($rawFilter)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
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
    public function inactivateUser(string $id)
    {
        
        return view('');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function selfInactivate(Request $request)
    {
        if($request->user()->status == User::STATUS_INACTIVE) {
            return redirect()->route('home');
        }
        $request->user()->status = User::STATUS_INACTIVE;
        return;
    }

    /**
     * Update the specified resource in storage.
     */
    public function selftDelete(Request $request)
    {
       $request->user()->delete();
        return view();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
