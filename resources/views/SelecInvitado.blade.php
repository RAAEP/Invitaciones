@extends('layouts.app')

@section('SelecInvitado')

<div class="container">

       <div class="row justify-content-center">
           <div class="col-md-8"></div>

           <form action="{{route('multi',['id'=>$invitacion['id']])}}" method="post" enctype="multipart/form-data">
            @csrf

           <table class="table table-striped">
            <thead class="thead-inverse">
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Puesto</th>
                    <th>Institución</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                       @foreach($invitados as $invitado)
                   <tr>
                       {{--Aqui van los nombres de las comlumns de nuestra base de datos--}}
                     <td>{{$invitado['id']}}</td>
                     <td>{{$invitado['nombre']}}</td>
                     <td>{{$invitado['puesto']}}</td>
                     <td>{{$invitado['institucion']}}</td>
                     <td><a href="{{route('visualizar',['id'=>$invitado['id'],'ds'=>$invitacion['id']])}}" class="btn btn-info" target="black">Visualizar</a></td>
                     <td><a href="{{route('imprimir',['id'=>$invitado['id'],'ds'=>$invitacion['id']])}}" class="btn btn-danger" target="black">Imprimir</a></td>

                     <td>



                          <div class="checkbox">

                                <input type="checkbox" name="check[]" value="{{ $invitado['id']}}">

                        </div>
                        @endforeach


                      </td>



                   </tr>




                </tbody>
        </table>

        <button type="submit" class="btn btn-success">Multiple</button>


    </form>

            </div>

            <div class="row justify-content-center">
                {{$invitados->links()}}
            </div>

       </div>
</div>

@endsection
