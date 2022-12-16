<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    public function categoryUI()
    {
        $categories = Category::all();
        return view('products.category', compact('categories'));
    }
    public function categorySave(Request $request)
    {
        $data = new Category();
        $data->name =  $request->name;
        $data->created_by = Auth::user()->id;
        $data->save();
        return back()->with('status', 'Category ceated');
    }
    public function createUI()
    {
        $categories = Category::where('status', 0)->get();
        return view('products.create', compact('categories'));
    }
    public function categoryDeactivate($id)
    {
        Category::where('id', $id)->update(['status' => 1]);
        return back()->with('status', 'Category deacivated');
    }
    public function categoryActivate($id)
    {
        Category::where('id', $id)->update(['status' => 0]);
        return back()->with('status', 'Category acivated');
    }

    public function saveProduct(Request $request)
    {
        $hero_image = time() . '.' . request()->hero_image->extension();
        request()->hero_image->move(public_path('hero_image/'), $hero_image);
        if (request()->image1) {
            $image1 = time() . '.' . request()->image1->extension();
            request()->image1->move(public_path('image1/'), $image1);
        } else {
            $image1 = null;
        }
        if (request()->image2) {
            $image2 = time() . '.' . request()->image2->extension();
            request()->image2->move(public_path('image2/'), $image2);
        } else {
            $image2 = null;
        }
        if (request()->image3) {
            $image3 = time() . '.' . request()->image3->extension();
            request()->image3->move(public_path('image3/'), $image3);
        } else {
            $image3 = null;
        }
        if (request()->image4) {
            $image4 = time() . '.' . request()->image4->extension();
            request()->image4->move(public_path('image4/'), $image4);
        } else {
            $image4 = null;
        }

        $product = new Product();
        $product->title=$request->title;
        $product->category=$request->category;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->weight=$request->weight;
        $product->hero_image=$hero_image;
        $product->image1=$image1;
        $product->image2=$image2;
        $product->image3=$image3;
        $product->image4=$image4;
        $product->created_by=Auth::user()->id;
        $product->save();
        $product_history = new ProductHistory();
        $product_history->product_id = $product->id;
        $product_history->action= 'Create new product';
        $product_history->price= $request->price;
        $product_history->user= Auth::user()->id;
        $product_history->save();
        return back()->with('status', 'Product Save');
    }
    public function allProduct(){
        $products = Product::all();
        return view('products.all_products',compact('products'));
    }
    public function productDeactivate($id)
    {
        Product::where('id',$id)->update(['status'=>1]);
        $product=Product::where('id',$id)->first();
        $product_history = new ProductHistory();
        $product_history->product_id = $product->id;
        $product_history->action= 'Deactivate product';
        $product_history->price= $product->price;
        $product_history->user= Auth::user()->id;
        $product_history->save();
        return back()->with('status', 'Product Deactivate');
    }
    public function productActivate($id)
    {
        Product::where('id',$id)->update(['status'=>0]);
        $product=Product::where('id',$id)->first();
        $product_history = new ProductHistory();
        $product_history->product_id = $product->id;
        $product_history->action= 'Activate product';
        $product_history->price= $product->price;
        $product_history->user= Auth::user()->id;
        $product_history->save();
        return back()->with('status', 'Product Activate');
    }
    public function edit($id){
        $categories = Category::where('status', 0)->get();
        $product=Product::where('id',$id)->first();
        return view('products.edit',compact('product','categories'));

    }
    public function update($id,Request $request)
    {
        $product = Product::where('id',$id)->first();
        if (request()->hero_image) {
        $hero_image = time() . '.' . request()->hero_image->extension();
        request()->hero_image->move(public_path('hero_image/'), $hero_image);
        }else{
            $hero_image= $product->hero_image;


        }
        if (request()->image1) {
            $image1 = time() . '.' . request()->image1->extension();
            request()->image1->move(public_path('image1/'), $image1);
        } else {
            $image1 = $product->image1;
        }
        if (request()->image2) {
            $image2 = time() . '.' . request()->image2->extension();
            request()->image2->move(public_path('image2/'), $image2);
        } else {
            $image2 = $product->image2;
        }
        if (request()->image3) {
            $image3 = time() . '.' . request()->image3->extension();
            request()->image3->move(public_path('image3/'), $image3);
        } else {
            $image3 = $product->image3;
        }
        if (request()->image4) {
            $image4 = time() . '.' . request()->image4->extension();
            request()->image4->move(public_path('image4/'), $image4);
        } else {
            $image4 = $product->image4;
        }


        $product->title=$request->title;
        $product->category=$request->category;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->weight=$request->weight;
        $product->hero_image=$hero_image;
        $product->image1=$image1;
        $product->image2=$image2;
        $product->image3=$image3;
        $product->image4=$image4;
        $product->save();
        $product_history = new ProductHistory();
        $product_history->product_id = $product->id;
        $product_history->action= 'Update  product';
        $product_history->price= $request->price;
        $product_history->user= Auth::user()->id;
        $product_history->save();
        return redirect('products/all');
    }
}
