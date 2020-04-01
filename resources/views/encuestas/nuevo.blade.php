@extends('layouts.app')


@section('styles')
<link rel="stylesheet" href="{{asset('css/summernote-bs4.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0 text-dark">Encuestas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item">Encuestas</li>
              <li class="breadcrumb-item active">{{$url}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                  <div class="card card-outline card-primary">
                    <div class="card-header">
                      <h3 class="card-title">
                        Nueva Encuesta
                      </h3>
                      <!-- tools box -->
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                          <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                title="Remove">
                          <i class="fas fa-times"></i></button>
                      </div>
                    </div>
                    <div class="card-body">
                        <form>
                          <div class="form-group">
                            <label>Contenido: </label>
                            <textarea class="form-control" rows="4" placeholder="Escribe el contenido de la encuesta"></textarea>
                          </div>
                          <div class="form-group">
                            <label>Acciones: </label>
                            <div class="form-group row">
                              <label class="col-lg-3">Color Identificador: <span id="colorPreview" style="border-radius:1em;" class="pr-5 bg-primary">&nbsp;</span></label>
                              <div class="col-lg-9">
                                <select class="form-control" name="colorCategoria" id="colorSelector">
                                          @foreach ($colores as $color)
                                              <option value="{{$color->id}}" data-color="{{$color->style_color}}">{{$color->nombre_color}}</option>
                                          @endforeach                          
                                </select>
                              </div>
                              <button class="btn btn-success" id="agregarAccion">Agregar +</button>
                          </div>                            
                            <div class="row mt-3">
                              <div class="col-lg-12" id="acciones">
                                
                              </div>
                            </div>
                          </div>
                          <button class="btn btn-success">Guardar encuesta</button>
                          <button class="btn btn-primary">Volver</button>
                        </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
  </section>
</div>

@endsection
@section('scriptbody')
    <script>
      $('#colorPreview').removeClass();
      $('#colorPreview').addClass(` pr-5 ${$('#colorSelector :selected').data('color')}`);
      $('#colorSelector').change(()=>{
        $('#colorPreview').removeClass();
        $('#colorPreview').addClass(` pr-5 ${$('#colorSelector :selected').data('color')}`);
      });
      $('#agregarAccion').click((e)=>{
        e.preventDefault();
        if($('.btn-accion').length<3){
          console.log($('.btn-accion').length);
          $('#acciones').append(`<div class='mr-2 btn ${$('#colorSelector :selected').data('color')} btn-accion'>Aceptar</div>`);
          console.log($('.btn-accion').length);
          if($('.btn-accion')[$('.btn-accion').length-1]){
            ($('.btn-accion')[$('.btn-accion').length-1]).addEventListener('click',(e)=>{
            e.preventDefault();
            e.target.setAttribute("contenteditable","true");
            e.target.focus();
          });
          ($('.btn-accion')[$('.btn-accion').length-1]).addEventListener('keydown',(e)=>{
            console.log(e.keyCode);
            if(e.keyCode == "13"){
              e.preventDefault();
              e.target.setAttribute("contenteditable","false");
              return false;
            }
          });
          ($('.btn-accion')[$('.btn-accion').length-1]).addEventListener('dblclick',(e)=>{
            e.preventDefault();
            tag = e.target;
            tag.remove();
          }); 
          } 
        }else{
          alert("Solo puede agregar hasta 3 acciones");
        }
      });
      
    </script>
@endsection