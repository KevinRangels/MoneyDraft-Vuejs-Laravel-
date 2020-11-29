<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Storage;
use Session;

class AdminController extends Controller
{
    public function __construct(){
	   	return $this->middleware('auth');
  	}

	  public function index(){
    	return view('content/home');
    }

    public function testimonies(){
      $testimonials = App\Testimonio::paginate(6);
      return view('content/testimonies', compact('testimonials'));
    }

    public function addTasa(Request $request){
    	$tasa = App\tasa::create($request->all());
    	return $tasa;
    }

    public function crearTasa(Request $request){
	   	 $request->validate([
	      'tasa' => 'required',
        'beneficio' => 'required'
	    ]);

   		$tasa = new App\tasa;
   		$tasa->tasa = $request->tasa;
      $tasa->beneficio = $request->beneficio; 
   		$tasa->save();

   		return response()->json([$request->all()]);
   }

    public function TasaLocalbitcoin(Request $request){
       $request->validate([
        'beneficio_localbitcoin' => 'required'
      ]);

      $beneficio_localbitcoin = new App\Beneficio;
      $beneficio_localbitcoin->beneficio_localbitcoin = $request->beneficio_localbitcoin;
      $beneficio_localbitcoin->save();
      return response()->json([$request->all()]);
   }
    public function addTestimonials(Request $request){

      $notification = array(
        'message' => 'Testimonio agregado con exito',
        'alert-type' => 'success'
      );
    $request->validate([
      'name' => 'required|regex:/^[\pL\s\-]+$/u',
      'operation' => 'required|numeric',
      'calification' => 'required|numeric|min:1|max:5',
      'date' => 'required',
      'testimonials' => 'required',
      'avatar' => 'required'
    ]);




      if($request->hasFile('avatar')){

        $file = $request->file('avatar');
        $name = time().$file->getClientOriginalName();
        $file->move(public_path().'/avatarTestimonial', $name);
      }

      $testimonio = new App\Testimonio;
      $testimonio->name = $request->name;
      $testimonio->testimonials = $request->testimonials;
      $testimonio->operation = $request->operation;
      $testimonio->calification = $request->calification;
      $testimonio->date = $request->date;
      $testimonio->avatar = $name;
      $testimonio->save();
       return redirect('/testimonios')->with($notification);
   }

    public function deleteTestimonials($id){
      $notification = array(
        'message' => 'Testimonio eliminado con exito',
        'alert-type' => 'success'
      );
    $testimonialsDelete = App\Testimonio::findOrFail($id);
    $testimonialsDelete->delete();

    return back()->with($notification);
   }
    public function testimonialDetails($id){
       $testimonial = App\Testimonio::findOrFail($id);
       return view('content.detailsTestimonials', compact('testimonial'));
   }
    public function updateTestimonial(Request $request, $id){
      $notification = array(
        'message' => 'Testimonio actualizado con exito',
        'alert-type' => 'success'
      );

    $request->validate([
      'name' => 'required|regex:/^[\pL\s\-]+$/u',
      'operation' => 'required|numeric',
      'calification' => 'required|numeric|min:1|max:5',
      'date' => 'required',
      'testimonials' => 'required'
    ]);


      if($request->hasFile('avatar')){
        $file = $request->file('avatar');
        $name = time().$file->getClientOriginalName();
        $file->move(public_path().'/avatarTestimonial', $name);
      }

     
      $testimonialUpdate = App\Testimonio::findOrFail($id);
      $testimonialUpdate->name = $request->name;
      $testimonialUpdate->operation = $request->operation;
      $testimonialUpdate->calification = $request->calification;
      $testimonialUpdate->date = $request->date;
      $testimonialUpdate->testimonials = $request->testimonials;
      if($request->hasFile('avatar')){
         $testimonialUpdate->avatar = $name;
      }
     
      $testimonialUpdate->save();

      return redirect('/testimonios')->with($notification);
   }

    
}
