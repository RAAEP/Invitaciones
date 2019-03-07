{{--Depende de la página app --}}
@extends('layouts.app')
{{--Nombre de la sección para colocar en el cuerpo de la página app--}}
@section('Muestrainvitados')
{{--Contenedor--}}
<div class="container">
{{--Fila--}}
       <div class="row justify-content-center">
           {{--En pantallas grandes mostrar en una col de 8--}}
           <div class="col-md-8"></div>


        {{--Tabla para mostrar las invitaciones--}}
           <table class="table table-striped">
                {{--Encabezado de la tabla--}}
            <thead class="thead-inverse">
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Puesto o Cargo</th>
                    <th>Institución</th>
                    <th></th>
                </tr>
                </thead>
                {{--Cuerpo de la tabla--}}
                <tbody>

                    {{--Recorrer con un foreach los objetos contenidos en la variables invitado, para poder accerder desde la varibles inv--}}
                       @foreach($invitado as $inv)
                   <tr>
                       {{--Aqui van los nombres de las comlumns de nuestra base de datos--}}
                     <td>{{$inv['id']}}</td>
                     <td>{{$inv['nombre']}}</td>
                     <td>{{$inv['puesto']}}</td>
                     <td>{{$inv['institucion']}}</td>
                      <td>
                      
                      
                        </td>


                   </tr>

                   @endforeach
                </tbody>
        </table>



    

            </div>

       </div>
</div>

@endsection
