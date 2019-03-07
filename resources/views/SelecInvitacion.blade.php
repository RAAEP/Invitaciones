@extends('layouts.app')

@section('SelecInvitacion')

<div class="container">

       <div class="row">
           <div class="col-md-8"></div>


           <table class="table table-striped">
            <thead class="thead-inverse">
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Dirección</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                       @foreach($invitado as $inv)
                   <tr>
                       {{--Aqui van los nombres de las comlumns de nuestra base de datos--}}
                     <td>{{$inv['id']}}</td>
                     <td>{{$inv['nombre']}}</td>
                     <td>{{$inv['descripcion']}}</td>
                     <td>{{$inv['fecha']}}</td>
                     <td> {{$inv['direccion']}} </td>
                     <td><a href="{{route('next2',['id'=>$inv['id']])}}" class="btn btn-primary" target="black">Usar</a></td>


                   </tr>
                   @endforeach
                </tbody>
        </table>


            </div>
       </div>
</div>

@endsection
