<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    public function index()
    {
        $brand = Brand::all();
        return $brand;
    }

    public function store(Request $request)
    {
        // $validated = $request->validated();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->messages()],
                Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $newBrand = Brand::query()->create([
            'name' => $request->name
        ]);

        return response()->json(["message" => "successfully created"], Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->messages()],
                Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $brand = Brand::query()->find($id);
        $brand->update([
            "name" => $request->name
        ]);
        return response()->json(['message' => "brand updated successfully"], Response::HTTP_OK);
    }

    public function destroy(Brand $brand, $id)
    {
        $brand = Brand::query()->find($id);
        if ($brand)
            $brand->delete();
        else
            return response()->json(error);

        return response()->json(['message' => "brand deleted successfully"], Response::HTTP_OK);
    }
}
