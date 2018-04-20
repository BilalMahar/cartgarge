<?php

namespace App\Http\Controllers;

use App\Category;
use App\Option;
use App\Product;
use App\ProductVariant;
use App\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function create(){
        return view('admin.create_product');
    }
    public function storeproduct(Request $request){

        $product = $request->all();
         Category::create($product);
        Session::flash('flash_message', 'your article is created');

        return redirect()->back();

    }
    public function add_product(Request $request){
        $products = Category::all();
        $keys = Option::all();
        $possibilitiesas  =null;

        return view('admin.add_product',compact('products','possibilitiesas','keys'));
    }

    public function store(Request $request)
    {
            $image = $request->file('image');

            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/attachment/');
            $image->move($destinationPath, $name);
            $path = '/attachment/' . $name;
            $input = $request->all();
            $input['file'] = $path;
            Product::create($input);

            Session::flash('flash_message', 'your article is created');
            return back();

        }

     public function storevariants(Request $request){
      $data = $request['varient'];


         $possibilities = [];

         $count = 0;
         foreach ($data as $val)
         {
             $values =explode(',' , $val['value']);
                 if ($count == 0)
                 {
                     $possibilities = $values;


                 }
                 else
                 {
                     $array1 = $possibilities;
                     $array3 = [];
                     foreach ( $values as $value)
                     {
                         $array2 = [];
                         foreach ($array1 as $oldVal)
                         {
                             $array2[] = $oldVal .' , '. $value;
                         }

                         $array3 = array_merge($array3 , $array2);
                     }

                     $possibilities = [];
                     $possibilities = $array3;

                 }


                 $count++;
             }
             dd($possibilities);

//             return view('admin.partials.variants',compact('possibilities'));


        }

        public function storeimage(Request $request){
            if ($request->hasFile('file')) {
                $request->validate([
                    'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
                ]);

                $image = $request->file('file');

                $name = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public', $name);
                return back();

            }
        }

        public function variant(){
            $products = Category::all();
            return view('admin.varient',compact('products'));
        }

        public function storevarient(Request $request){
            $varient = $request->all();
            Option::create($varient);
            Session::flash('flash_message', 'your article is created');
            return back();

        }








}
