<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(Request $request) {
        $this->validate($request, [
            'title' => 'required|string|unique:states'
        ]);

        $state = State::create([
            'title' => $request->input('title')
        ]);

        return response()->json($state);
    }

    public function update(Request $request) {
        $this->validate($request, [
            'id' => 'required|integer',
            'title' => 'required|string',
        ]);

        $state = State::findOrFail($request->input('id'));
        $state->title = $request->input('title');
        $state->save();
        return response()->json($state);
    }
}
