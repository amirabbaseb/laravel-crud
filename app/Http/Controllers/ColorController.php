<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ColorController extends Controller
{
    public function index()
    {
        $color = Color::all();
        return $color;
    }

    public function store(Request $request)
    {
        // $validated = $request->validated();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'hex_code' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->messages()],
                Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $newColor = Color::query()->create([
            'name' => $request->name
        ]);

        return response()->json(["message" => "successfully created"], Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'hex_code' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->messages()],
                Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $color = Color::query()->find($id);
        $color->update([
            "name" => $request->name,
            "hex_code" => $request->hex_code
        ]);
        return response()->json(['message' => "color updated successfully"], Response::HTTP_OK);
    }

    public function destroy(Color $color, $id)
    {
        $color = Color::query()->findOrFail($id);
        if ($color)
            $color->delete();
        else
            return response()->json(error);

        return response()->json(['message' => "color deleted successfully"], Response::HTTP_OK);
    }
}
