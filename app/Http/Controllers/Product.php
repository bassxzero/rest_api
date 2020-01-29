<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class Product extends Controller
{
    public function destroy($id){
        $product = \App\Product::find($id);
        
        if( $product === null ){
            return response()->json(null, 404);
        }

        if( !$product->delete() ){
            //TODO this is bad and if I have time i'll fix it
            return response()->json(['errors'=>'model failed to delete']);
        }
        
        return response()->json(null, 204);
    }  

    public function index(){
        $products = \App\Product::all();       

        return response()->json($products);
    }
    
    public function store(Request $request){
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255'
        ]);


        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()]);
        }


        $product = \App\Product::create($input);

        return response()->json($product->toArray());
    }
    
    public function show($id){
        $product = \App\Product::find($id);

        if( $product === null ){
            return response()->json(null, 404);
        }

        return response()->json($product);
    }

    public function update(Request $request, $id){
        $product = \App\Product::find($id);

        if( $product === null ){
            return response()->json(null, 404);
        } 

        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255'
        ]);

        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()]);
        }

        $product->title = $input['title'];
        $product->description = $input['description'];
        
        if( !$product->save() ){            
            //TODO this is bad and if I have time i'll fix it
            return response()->json(['errors'=>'model failed to save']);            
        }
        
        return response()->json($product,201);        
    }
}
