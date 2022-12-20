<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Viral;
use Illuminate\Support\Facades\File;

class ViralController extends Controller
{
    public function virallist(){
        $virallist = Viral::all();
        return view('backendsecond.pages.partial.viralessu.virallist',compact('virallist'));
    }
    public function viralform(){
        return view('backendsecond.pages.partial.viralessu.viralform');

    }

    public function viralcreate(Request $request){
        
        $pic_crud = new Viral();
        $pic_crud->viral_name = $request->viral_name;
        
        if ($request->hasfile('viral_image')){
            $file=$request->file('viral_image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('imagefile/viralpic',$filename);
            $pic_crud->viral_image =$filename;
        }
        $pic_crud->save();
        return redirect()->route('viral.list');

    }
    public function edit_viralform($id){
        $viraledit=Viral::find($id);
        return view('backendsecond.pages.partial.viralessu.viralupdateform',compact('viraledit'));
    }
    public function viral_updated(Request $request ,$id){
        $pic_updated=Viral::find($id);
        $pic_updated->viral_name = $request->viral_name;
         
        if ($request->hasfile('viral_image')){
            $destination='imagefile/viralpic'.$pic_updated->viral_image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file=$request->file('viral_image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('imagefile/viralpic',$filename);
            $pic_updated->viral_image =$filename;
        }
        $pic_updated->save();

        return redirect()->route('viral.list');
    }
    public function viral_delete($id){
        Viral::find($id)->delete();
        return back();
    }
}
