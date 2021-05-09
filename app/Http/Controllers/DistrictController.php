<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
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
            'title' => 'required|string|unique:districts',
            'state_id' => 'required|integer|exists:App\Models\State,id'
        ]);

        $district = District::create([
            'title' => $request->input('title'),
            'state_id' => $request->input('state_id')
        ]);

        return response()->json($district);
    }

    public function update(Request $request) {
        $this->validate($request, [
            'id' => 'required|integer',
            'title' => 'required|string',
            'state_id' => 'required|integer'
        ]);

        $district = District::findOrFail($request->input('id'));
        $district->title = $request->input('title');
        $district->state_id = $request->input('state_id');

        $district->save();

        return response()->json($district);
    }
}
