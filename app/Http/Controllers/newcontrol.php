<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Userinfo;

class newcontrol extends Controller
{
    public function employee(){
        return view('backendsecond.pages.partial.employee');
    }
    public function category(){
        $categories=Category::all();
        return view ('backendsecond.pages.partial.category',compact('categories'));
    }
    
    public function createpage(){
        return view ('backendsecond.pages.partial.createpage');
    }
    
    public function create(Request $request){
        $request->validate([
            'category_name'=>'required|alpha',
            'category_details'=>'required'
          ]);
        //dd($request->all());
        //  migration column name => input field name
         Category::create([
            'category_name'=>$request->category_name,
            'category_details'=>$request->category_details,
            'mobile'=>$request->mobile,

         ]);
         
        return redirect(url('category'));
    }
    
    public function deletecategory($id){
          //dd($id);
          Category::find($id)->delete();
          return back()->with('danger','your form has been deleted');
    }
    public function edit($id){
          //dd($id);
          $categoryEdit=Category::find($id);
          return view('backendsecond.pages.partial.updatecategorypage',compact('categoryEdit'));
    }
    public function updatecategory(Request $request, $id){
          //dd($id);
          $request->validate([
            'category_name'=>'required|alpha',
            'category_details'=>'required'
          ]);
          $updatecategory=Category::find($id);
          $updatecategory->update([
          'category_name'=>$request->category_name,
          'category_details'=>$request->category_details,
          'mobile'=>$request->mobile,
          ]);
          return redirect()->route('category')->with('success','Subcategory Updated Successfully');
          
    }



    //users start
    public function users(){
        return view ('backendsecond.pages.partial.users');
    }
    public function usercreate(Request $request){
       $request->validate([
        'user_name'=>'required',
        'user_email'=>'required'
       ]);
       //dd($request->all());
        Userinfo::create([
         'user_name'=>$request->user_name,
         'user_email'=>$request->user_email,
         'user_mobile'=>$request->user_mobile,
         'user_address'=>$request->user_address,
        ]);
        return redirect()->route('usershowpage')->with('success','user details created');
    }
    public function usershowpage(){
        $alluser=Userinfo::all();
        return view('backendsecond.pages.partial.usershow', compact('alluser'));
    }
    public function deleteuser($id){
        Userinfo::find($id)->delete();
        return back()->with('danger','user details deleted');
    }
    public function edituser($id){
        $edituser=Userinfo::find($id);
        return view('backendsecond.pages.partial.userupdateform',compact('edituser'));
    }
    public function updateduser(Request $request, $id){
        $updateduser=Userinfo::find($id);
        $updateduser->update([
         'user_name'=>$request->user_name,
         'user_email'=>$request->user_email,
         'user_mobile'=>$request->user_mobile,
         'user_address'=>$request->user_address,
        ]);
        return redirect()->route('usershowpage');
    }
    

}
