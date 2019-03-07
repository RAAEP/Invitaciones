@extends('layouts.app')

@section('Registrarinvitado')

<div class="container">

    @if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{\Session::get('success')}}</p>
    </div>

    @endif



    <div class="row justify-content-center">

        <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        Registra invitados
                    </div>
                    <div class="card-body">
                         <form action="{{url('registro')}}" method="post">

                            @csrf
                            <div class="form-group">
                              <label for="nombre">Nombre:</label>
                              <input type="text" name="nombre" id="" class="form-control" placeholder="" aria-describedby="helpId">

                            </div>

                            <div class="form-group">
                              <label for="puesto">Puesto:</label>
                              <input type="text" name="puesto" id="" class="form-control" placeholder="" aria-describedby="helpId">

                            </div>

                            <div class="form-group">
                              <label for="institucion">Institución</label>
                              <input type="text" name="institucion" id="" class="form-control" placeholder="" aria-describedby="helpId">

                            </div>



                            <button type="submit" class="btn btn-primary ">Registrar</button>
                            <button type="submit" class="btn btn-danger">Cancelar</button>

                          </form>
                    </div>

                </div>



    </div>
</div>

@endsection
