<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Validator;
use DB;

class Product extends Controller
{
    public function destroy($id)
    {
        $product = \App\Product::find($id);

        if ($product === null) {
            return response()->json(null, 404);
        }

        if (!$product->delete()) {
            //TODO this is bad and if I have time i'll fix it
            return response()->json(['errors' => 'model failed to delete']);
        }

        return response()->json(null, 204);
    }

    public function index()
    {
        $products = \App\Product::all();

        return response()->json($products);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'required|string|in:clearance,discontinued,active,backorder',
            'warehouse_id' => 'required|numeric|gt:0',
            'stock' => 'required|numeric|min:0',
            'unit_price' => 'required|numeric|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        try {

            DB::beginTransaction();

            $product = \App\Product::create([
                "title" => $input['title'],
                "description" => $input['description'],
                "status" => $input['status'],
            ]);

            $answer = $product->prices()->create([
                "price" => $input['unit_price']
            ]);

            $warehouse_product = $product->warehouse_product()->create([
                "warehouse_id" => $input['warehouse_id'],
                "available_stock" => $input['stock']
            ]);

            DB::commit();

        } catch (QueryException $exception) {

            DB::rollBack();
            //TODO this is bad and if I have time i'll fix it
            return response()->json(['errors' => 'model failed to save']);
        }

        return response()->json($product->toArray());
    }

    public function show($id)
    {
        $product = \App\Product::find($id);

        if ($product === null) {
            return response()->json(null, 404);
        }

        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $product = \App\Product::find($id);

        if ($product === null) {
            return response()->json(null, 404);
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'required|string|in:clearance,discontinued,active,backorder',
            'unit_price' => 'required|numeric|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        try {

            DB::beginTransaction();

            $product->title = $input['title'];
            $product->description = $input['description'];
            $product->status = $input['status'];

            $answer = $product->prices()->create([
                "price" => $input['unit_price']
            ]);

            if (!$product->save()) {
                //TODO this is bad and if I have time i'll fix it
                DB::rollBack();
                return response()->json(['errors' => 'model failed to save']);
            }

            DB::commit();

        } catch (QueryException $exception) {

            DB::rollBack();
            //TODO this is bad and if I have time i'll fix it
            return response()->json(['errors' => 'model failed to save']);
        }

        return response()->json($product, 201);
    }
}
