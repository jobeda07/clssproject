<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Userinfo;
use App\Models\Imagecurd;
// use Faker\Core\File;
use Illuminate\Support\Facades\File;

class newcontrol extends Controller
{
    
    
    // public function employee_create(Request $request){
    //       $request->validate([
    //         'employee_name'=>'required',
    //         'employee_image'=>'required'

    //       ]);
     
    //       $employee_image=$request->employee_image;
    //       $imagename=time().'.'.$employee_image->getClientOriginalExtension();
    //       $request->employee_image->move('imagefile/employee' ,$imagename);

    //     //$imagename = $request->file('employee_image')->store('imagefile', 'public');


    //       //$imagename='';
    //     //   if($employee_image = $request->file('employee_image')){
    //     //     $imagename =time().'.'.$employee_image->getClientOrginalExtension();
    //     //     $request->employee_image->move('imagefile/employee',$imagename);
    //     //   }
    //     Imagecurd::create([
    //         'employee_name'=>$request->employee_name,
    //         'employee_image'=>$imagename
    //       ]);
    //       return redirect()->route('employee.list');
    // }
    // 


    //updateimage
    // public function employee_update(Request $request ,$id){
    //     $employeenew = Imagecurd::find($id);
    //     $request->validate([
    //         'employee_name'=>'required'
    //       ]);
    //     $oldimgdelete='imagefile/employee/'.$employeenew->employee_image;
    //     if(File::exists($oldimgdelete)){
    //         File::delete($employeenew);
    //     }
    //     else {
    //         $imagename=$employeenew->employee_image;
    //     }
    //       $employee_image=$request->employee_image;
    //       $imagename=time().'.'.$employee_image->getClientOriginalExtension();
    //       $request->employee_image->move('imagefile/employee' ,$imagename);

    //       Imagecurd::create([
    //         'employee_name'=>$request->employee_name,
    //         'employee_image'=>$imagename
    //       ]);
    //       return redirect()->route('employee.list');

    // }





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

    


    public function employee_form(){
        return view('backendsecond.pages.partial.employeeform');
    }

    public function employee_list(){
        $employees = Imagecurd::all();
       return view('backendsecond.pages.partial.employeelist',compact(('employees')));
   }

   public function  employee_editform($id){
       $imagecruds = Imagecurd::find($id);
        return view ('backendsecond.pages.partial.employee-edit',compact('imagecruds'));

    }



    #another create system
    public function employee_create(Request $request){
     $imagecruds = new Imagecurd();

     $imagecruds->employee_name = $request->employee_name;
    
     if($request->hasfile('employee_image')){
        $file = $request->file('employee_image');
        $extention = $file-> getClientOriginalExtension();
        $filename = time().'.'.$extention;
        $file->move('uploade/image',$filename);
        $imagecruds->employee_image = $filename;
     }
     $imagecruds->save();
      return redirect()->route('employee.list');
  
         
    }

    public function employee_update(Request $request,$id){
        $imagecruds =Imagecurd::find($id);
   
        $imagecruds->employee_name = $request->employee_name;
       
        if($request->hasfile('employee_image')){
            $destination= 'uploade/image'.$imagecruds->employee_image;
            if(File::exists($destination)){
                File::delete($destination);
            }
           $file = $request->file('employee_image');
           $extention = $file-> getClientOriginalExtension();
           $filename = time().'.'.$extention;
           $file->move('uploade/image',$filename);
           $imagecruds->employee_image = $filename;
        }
        $imagecruds->update();
         return redirect()->route('employee.list');
    }



    public function employee_delete($id){
       Imagecurd::find($id)->delete();
        return back();    
    }
    
   
    

}

