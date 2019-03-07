@extends('layouts.app')

@section('Registrainvitacion')

<div class="container">

    @if (\Session::has('bien'))
    <div class="alert alert-success">
        <p>{{\Session::get('success')}}</p>
    </div>

    @endif



    <div class="row justify-content-center">

        <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        Registra invitaciones
                    </div>
                    <div class="card-body">
                         <form action="{{url('registroInvitacion')}}" method="post">

                            @csrf
                            <div class="form-group">
                              <label for="nombre">Nombre:</label>
                              <input type="text" name="nombre" id="" class="form-control" placeholder="" aria-describedby="helpId">

                            </div>

                            <div class="form-group">
                              <label for="descripcion"></label>
                              <textarea class="form-control" name="descripcion" id="" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                              <label for="fecha">Fecha:</label>
                              <input type="date" name="fecha" id="" class="form-control" placeholder="" aria-describedby="helpId">

                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección:</label>
                                <input type="text" name="direccion" id="" class="form-control" placeholder="" aria-describedby="helpId">

                              </div>

                            <button type="submit" class="btn btn-primary ">Registrar</button>
                            <button type="submit" class="btn btn-danger">Cancelar</button>

                          </form>
                    </div>

                </div>



    </div>
</div>

@endsection
