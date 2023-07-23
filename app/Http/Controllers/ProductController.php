<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Product;
use App\Models\ProductHistory;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    public function subjectUI()
    {
        $subjects = Subject::all();
        return view('products.subject', compact('subjects'));
    }
    public function subjectSave(Request $request)
    {
        $data = new Subject();
        $data->name =  $request->name;
        $data->created_by = Auth::user()->id;
        $data->save();
        return back()->with('status', 'Subject ceated');
    }

    public function subjectDeactivate($id)
    {
        Subject::where('id', $id)->update(['status' => 1]);
        return back()->with('status', 'Subject deacivated');
    }
    public function subjectActivate($id)
    {
        Subject::where('id', $id)->update(['status' => 0]);
        return back()->with('status', 'Subject acivated');
    }


    public function lessonUI()
    {
        $lessons = Lesson::all();
        return view('products.lesson', compact('lessons'));
    }
    public function lessonSave(Request $request)
    {
        $data = new Lesson();
        $data->name =  $request->name;
        $data->created_by = Auth::user()->id;
        $data->save();
        return back()->with('status', 'Lesson ceated');
    }
    public function lessonDeactivate($id)
    {
        Lesson::where('id', $id)->update(['status' => 1]);
        return back()->with('status', 'Subject deacivated');
    }
    public function lessonActivate($id)
    {
        Lesson::where('id', $id)->update(['status' => 0]);
        return back()->with('status', 'Subject acivated');
    }
    public function createUI()
    {
        $subjects = Subject::where('status', 0)->get();
        $lessons = Lesson::where('status', 0)->get();
        return view('products.create', compact('subjects','lessons'));
    }
    public function saveProduct(Request $request)
    {
        $hero_image = time() . '.' . request()->hero_image->extension();
        request()->hero_image->move(public_path('hero_image/'), $hero_image);



        $product = new Product();
        $product->title=$request->title;
        $product->subject=$request->subject;
        $product->lesson=$request->lesson;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->qty=$request->qty;
        $product->hero_image=$hero_image;
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
        $subjects = Subject::where('status', 0)->get();
        $lessons = Lesson::where('status', 0)->get();
        $product=Product::where('id',$id)->first();
        return view('products.edit',compact('product','subjects','lessons'));

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



        $product->title=$request->title;
        $product->subject=$request->subject;
        $product->lesson=$request->lesson;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->qty=$request->qty;
        $product->hero_image=$hero_image;
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
