@extends('ltewrapper')
@section('home')
  <div class="main-testimonials">

        <div class="content-header py-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <h1 class="panel_title mb-0">Detalles de testimonio</h1>
                        @if(Session::has('message'))
							<div class="alert alert-success  p-2">
						         <strong>{{ Session::get('message') }}</strong>
						    </div>
						@endif
                            
                    </div>
                </div>

            </div>
        </div>
 
        <div class="container_form_details mt-4">
        <form action="{{ route('testimonial.update', $testimonial->id) }}" method="POST" id="testimonialsForm" enctype="multipart/form-data">
             @method('PUT')
      @csrf
        
            <div class="row filas_form_detail">

                <div class="container_input col-3 ">
                   <label class="form_labels">Nombre y apellido</label>
                   <input type="text" name="name" placeholder="Nombre" class="tasa_config_input input-group" value="{{ $testimonial->name }}">
                    @if($errors->has('name'))
                        <div class="error_validation">{{ $errors->first('name') }}</div>
                    @endif    
                </div>

                <div class="container_input col-3 ">
                    <label class="form_labels">Monto de operacion</label>
                    <input type="text" name="operation"   placeholder="Monto de cambio" class=" tasa_config_input input-group" value="{{ $testimonial->operation }}">
                     @if($errors->has('operation'))
                        <div class="error_validation">{{ $errors->first('operation') }}</div>
                    @endif
                </div>

                <div class="container_input col-3 ">
                    <label class="form_labels">Calificacion</label>
                    <input  type="number" name="calification"  min="1" max="5"  placeholder="Calificacion" class=" tasa_config_input input-group" value="{{ $testimonial->calification }}">
                     @if($errors->has('calification'))
                        <div class="error_validation">{{ $errors->first('calification') }}</div>
                    @endif
                </div>
            </div>
            <div class="row filas_form_detail">
                <div class="container_input col-3 ">
                    <label class="form_labels">Fecha</label>
                    <input type="date" name="date"   placeholder="Fecha" class=" tasa_config_input date input-group" value="{{ $testimonial->date }}">
                     @if($errors->has('date'))
                        <div class="error_validation">{{ $errors->first('date') }}</div>
                     @endif
                </div>
                <div class="container_input col-3 ">
                    <label class="form_labels">Imagen</label>
                    <input type="file" name="avatar" id="avatar" ref="myFiles"   class=" tasa_config_input file input-group" >
                    
                </div>
                <div class="container_input col-3 ">
                    <label class="form_labels">Testimonio</label>
                    <textarea name="testimonials"   placeholder="Ingresa un testimonio"  class=" tasa_config_input input-group" rows="4" cols="50" form="testimonialsForm">{{ $testimonial->testimonials }}</textarea>
                     @if($errors->has('testimonials'))
                        <div class="error_validation">{{ $errors->first('testimonials') }}</div>
                    @endif
                </div>
            </div>
            <div class="row  filas_form_detail_btn">
                <button type="submit" class="btn btn-success tasa_config_btn">Actualizar</button> 
            </div>
        </form>            
        </div>



  
  </div>
@endsection