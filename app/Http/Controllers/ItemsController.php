<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ItemsController extends Controller
{
    public function index()
    {
        $item = Items::all();
        return $item;
    }

    public function store(Request $request)
    {
        // $validated = $request->validated();
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'price' => 'required',
            'sub_name' => 'required|string',
            'brand_id' => 'required|string',
            'color_id' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->messages()],
                Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $newItem = Items::create([
            'title' => $request->title,
            'price' => $request->price,
            'sub_name' => $request->sub_name,
            'brand_id' => $request->brand_id,
            'color_id' => $request->color_id
        ]);

        return response()->json(["message" => "successfully created"], Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $item = Items::find($id);
        $item->update([
            "title" => $request->title,
            "price" => $request->price,
            "sub_name" => $request->sub_name,
        ]);
        return response()->json(['message' => "item updated successfully"], Response::HTTP_OK);
    }

    public function destroy(Items $item, $id)
    {
        $item = Items::findOrFail($id);
        if ($item)
            $item->delete();
        else
            return response()->json(error);

        return response()->json(['message' => "item deleted successfully"], Response::HTTP_OK);
    }
}
