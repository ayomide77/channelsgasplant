<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Testimonial;
class TestimonialController extends Controller
{
    

    public function index(){
        $testimonials = Testimonial::paginate(10);
        return view('admin.testimonial.index',compact('testimonials'));
    }


    public function edit($id)
    {
    $testimonial = Testimonial::where('id',$id)->first();
    return view('admin.testimonial.edit',compact('testimonial'));
    }

    public function update(Request $request , $id){
    $this->validate($request,[
        'status' => 'required|max:255',
    ]);

    $testimonial = Testimonial::find($id);

    $testimonial->status = $request->status;

   if($testimonial->save()){
       return back()->with('success','Testimonial approved');
   }else{
       return back()->with('error','Error updating testimonial try again');

   }
    
    }


    public function destroy($id){
        $testimonial = Testimonial::find($id);

        $testimonial->delete();

        return back()->with('success','Testimonial deleted succesfully');
    }
}
