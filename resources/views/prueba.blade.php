{{--Estamos llamando al complemento cabezera que se encuentra en la carpeta layouts--}}
@extends('layouts.cabezera')

{{--Esta colocando el nombre de la seccion que vamos a mostrar en el cuerpo de nuestra cabezera.--}}
@section('contenet')
{{--Creamos un contenedor--}}



        @foreach ($in as $invitado)






        <div class="container">

            {{--Colocamos una clase fila, poniendo todo el contenido en el centro.--}}
                    <div class="row justify-content-center">
            {{--Tabla para alamcenar los datos de nuestra invitación--}}
                            <table id="table" style='page-break-after:always;' >
                                {{--Creamos el encabezado de nuestra invitación--}}
                                    <thead>
            {{--Colocamos los dos logo tipos y el título de nuestro encabezado.--}}
                                        <tr>
                                        <th><img src="img/escudoQR.png" alt="" class="logo"></th>
                                        <th><p id="titulo">Instituto Quintanarroense de Innovación y Tecnología </p></th>
                                        <th><img src="img/logotipo1.png" alt="" class="logo"></th>

                                        </tr>
                                    </thead>

                                    {{--Creamos el cuerpo de nuestro invitación--}}
                                    <tbody>

                                        <tr>
                                        <td></td>
                                        {{--En esta parte colocamos el texto principal de nuestra invitación--}}
                                        <td id="intro">

                                            {{--Anunciar el nombre del evento--}}
                                            <p id="titulo"> {{$invitacion['nombre']}} </p>
                                            {{--Nombre de la persona invitada--}}
                                            <p class="subtitulo">{{$invitado['nombre']}}</p>
                                            <p class="subtitulo">{{$invitado['puesto']}} </p>

                                            {{--Motivo del evento--}}

                                            <p id="escrito"> {{$invitacion['descripcion']}} </p>
                                            <p id="escrito"> Evento que se llevara a cabo  {{$invitacion['fecha']}} en
                                                    {{$invitacion['direccion']}} </p>
                                        </td>
                                        <td></td>
                                        </tr>

                                    </tbody>
                                    {{--Pie de página de la invitación --}}
                                    <tfoot>
                                        <tr>
                                            <td><div class="title m-b-md">

                                                <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(100)->generate($invitado['nombre'])) }} ">

                                             </div></td>
                                            {{--Este apartado ponemos la fecha y la dirección a la cual van asistir.--}}
                                            <td id="pie">Gracias {{$invitado['nombre']}} </td>

                                        </tr>
                                    </tfoot>


                            </table>




                    </div>


            </div>


        @endforeach

@endsection
