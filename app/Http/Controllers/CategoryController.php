<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){

        $categories = Category::all();
        return view('dashboard.category.index',compact('categories'));
    }

    public function store(Request $request){
        $manager = new ImageManager(new Driver());

        $request->validate([
            'title' => 'required',
            'image' => "required|image",
        ]);

        if($request->hasFile('image')){
            $newname = auth()->user()->id .'-'. $request->title .'-'. rand(1111,9999) .'.'. $request->file('image')->getClientOriginalExtension();
            $image = $manager->read($request->file('image'));
            $image->toPng()->save(base_path('public/uploads/category/'.$newname));


            if($request->slug){

                Category::insert([
                    'title' => Str::ucfirst($request->title),
                    'slug' => Str::slug($request->slug,'-'),
                    'image' => $newname,
                    'created_at' => now(),
                ]);
                return back()->with('category_success','Category Insert Successfull');
            }else{
                Category::insert([
                    'title' => Str::ucfirst($request->title),
                    'slug' => Str::slug($request->title,'-'),
                    'image' => $newname,
                    'created_at' => now(),
                ]);
                return back()->with('category_success','Category Insert Successfull');
            }


        }

    }
}
