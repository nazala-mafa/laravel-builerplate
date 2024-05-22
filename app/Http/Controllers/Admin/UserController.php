<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        private User $user
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

    public function select2_handler(Request $request)
    {
        $results = $this->user
            ->where(function($query) use($request) {
                if ($request->q) {
                    $query->where('username', 'like', "%$request->q%");
                    $query->orWhere('email', 'like', "%$request->q%");
                }
            })
            ->get(['id', 'username'])
            ->map(fn($item) => [
                'id' => $item->id,
                'text' => $item->username,
                'selected' => ($request->selected_id == $item->id)
            ]);
        
        return response()->json(compact('results'));
    }
}
