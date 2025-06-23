<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Step;
use Illuminate\Http\Request;

class StepController extends Controller
{
    /**
     * Display a listing of the steps.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $steps = Step::orderBy('order', 'asc')->get();
        
        return response()->json([
            'success' => true,
            'data' => $steps
        ]);
    }

    /**
     * Store a newly created step in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string',
            'image_url' => 'required|string',
            'color' => 'required|string',
            'order' => 'required|integer'
        ]);

        $step = Step::create($validated);

        return response()->json([
            'success' => true,
            'data' => $step
        ], 201);
    }

    /**
     * Display the specified step.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $step = Step::find($id);

        if (!$step) {
            return response()->json([
                'success' => false,
                'message' => 'Step not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $step
        ]);
    }

    /**
     * Update the specified step in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $step = Step::find($id);

        if (!$step) {
            return response()->json([
                'success' => false,
                'message' => 'Step not found'
            ], 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'icon' => 'sometimes|string',
            'image_url' => 'sometimes|string',
            'color' => 'sometimes|string',
            'order' => 'sometimes|integer'
        ]);

        $step->update($validated);

        return response()->json([
            'success' => true,
            'data' => $step
        ]);
    }

    /**
     * Remove the specified step from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $step = Step::find($id);

        if (!$step) {
            return response()->json([
                'success' => false,
                'message' => 'Step not found'
            ], 404);
        }

        $step->delete();

        return response()->json([
            'success' => true,
            'message' => 'Step deleted successfully'
        ]);
    }
}