@extends('ltewrapper')
@section('home')
@include('toast::messages')


{{-- @if(Session::has('toasts'))
  @foreach(Session::get('toasts') as $toast)
    <div class="alert alert-{{ $toast['level'] }}">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

      {{ $toast['message'] }}
    </div>
  @endforeach
@endif --}}
          {{-- <content-testimonies></content-testimonies> --}}
              <div class="main-testimonials">

                

        <div class="content-header py-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <h1 class="panel_title mb-0">Testimonios</h1>
  
                 
                    </div>
                </div>

            </div>
        </div>
                              		  	
        <section class="panel_content">
          <div class="container-fluid">
              <div class="row mt-4">
                <div class="col-md-12 col-lg-5 col-12 ">
                    <div class="testimonies_add_container" style="background: white">
                        <h4 class="testimonies_title">Agregar Testimonio</h4>


                          <form  class="form-testimonials d-flex"  action="{{ route('add.testimonials') }}" method="POST"  enctype="multipart/form-data" id="testimonialsForm">
                          	@csrf
                          <div class="col-lg-12 col-md-12 col-12 mb-3">
                            <label class="form_labels">Nombre y apellido</label>
                              <input type="text" name="name" placeholder="Nombre" class="tasa_config_input input-group">
                              @if($errors->has('name'))
                                  <div class="error_validation">{{ $errors->first('name') }}</div>
                              @endif
                          </div>

                          <div class="col-lg-12 col-md-12 col-12 mb-3">
                            <label class="form_labels">Monto de operacion</label>
                              <input type="text" name="operation"   placeholder="Monto de cambio"  class="tasa_config_input input-group">
                              @if($errors->has('operation'))
                                  <div class="error_validation">{{ $errors->first('operation') }}</div>
                              @endif

                          </div>
                          <div class="col-lg-12 col-md-12 col-12 mb-3">
                            <label class="form_labels">Calificacion</label>
                              <input type="number" name="calification"  min="1" max="5"  placeholder="Calificacion"  class="tasa_config_input input-group">
                              @if($errors->has('calification'))
                                  <div class="error_validation">{{ $errors->first('calification') }}</div>
                              @endif

                          </div>
                          <div class="col-lg-12 col-md-12 col-12 mb-3">
                            <label class="form_labels">Fecha</label>
                              <input type="date" name="date"   placeholder="Fecha"  class="tasa_config_input date input-group">
                              @if($errors->has('date'))
                                  <div class="error_validation">{{ $errors->first('date') }}</div>
                              @endif
                          </div>
                          <div class="col-lg-12 col-md-12 col-12 mb-3">
                            <label class="form_labels">Imagen</label>
                              <input type="file" name="avatar" id="avatar" ref="myFiles"   placeholder="Beneficio"  class="tasa_config_input file input-group">                        
                              @if($errors->has('avatar'))
                                  <div class="error_validation">{{ $errors->first('avatar') }}</div>
                              @endif
                          </div>
                         <div class="col-lg-12 col-md-12 col-12 mb-3">
                            <label class="form_labels">Testimonio</label>                             
                              <textarea name="testimonials"   placeholder="Ingresa un testimonio"  class="tasa_config_input input-group" rows="4" cols="50" form="testimonialsForm"></textarea>
                              @if($errors->has('testimonials'))
                                  <div class="error_validation">{{ $errors->first('testimonials') }}</div>
                              @endif
                         </div>
	
                          <div class="col-lg-12 col-md-12  col-12 ">
                              <button type="submit" class="btn btn-success tasa_config_btn">Agregar</button> 
                          </div>
                        </form>
                                   
                    </div>                  
                </div>

                {{-- TABLA DE TESTIMONIOS --}}
                {{-- <div class="col-md-12 col-lg-5 col-12 "> --}}
                 <div class="table-responsive-xl tabla_container  col-lg-7 col-12">
 
                  <table class="table table-striped" style="background: white">
  					      <thead>
  					        <tr>
  					          <th scope="col">Nombre</th>
  					          <th scope="col">Operacion</th>
  					          <th scope="col">Calificación</th>
  					          <th scope="col">Fecha</th>
  					          <th scope="col">Testimonios</th>
  					          <th scope="col">Avatar</th>
  					          <th scope="col">Acciones</th>
  					        </tr>
  					      </thead>
  					      <tbody>
  					        @foreach($testimonials as $item)
  					        <tr>
  					          <th>{{$item->name}}</th>
  					          <th>{{$item->operation}}</th>
  					          <th style="text-align: center;">{{$item->calification}}</th>
  					          <th>{{$item->date}}</th>
  					          <th>{{$item->testimonials}}</th>
  					          <th style="text-align: center;">
  					          	<a href="avatarTestimonial/{{$item->avatar}}" target="_blank">Ver imagen</a> 
  					          </th>
  					          <th style="text-align: center;">
  					            <a href="{{ route('testimonial.detail', $item) }}" class="">Detalles</a>
  					            <form action="{{ route('testimonials.eliminar', $item) }}" method="POST" class="d-inline">
  					              @method('DELETE')
  					              @csrf
  					              <button class="btn_table_testimonials_delete" type="submit" style="border: none;
      color: red;
      font-weight: unset;background: none">Eliminar</button>
  					            </form>
  					             
  					          </th>
  					        </tr>
  					        @endforeach
  					      </tbody>
  					    </table>
                <div class="container_pagination d-flex justify-content-end">
                  {{ $testimonials->links() }}

                </div>
              {{-- </div> --}}
                </div>

              </div>
          </div>

  
        </section>

    </div>

@endsection