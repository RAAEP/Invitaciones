<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{--Quitar esta linea 30 reportes--}}

    <title>Invitación</title>
    <style>

        *{
            margin: 0px;
            padding: 0px;
        }

        .logo{
            margin: 10px;
            width: 100px;
            height: 100px;
        }

        #intro{
            margin: 20px;
            height: 700px;
            width: 500px
        }

        #titulo{
            text-align: center;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 20px;
            margin: 20px;
            line-height: 1.9;
        }

        .subtitulo{
            text-align: left;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 16px;
            line-height: 1.9;
        }


        #escrito{
            text-align: justify;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 15px;
            line-height: 1.7;
        }

        #pie{
            text-align: center;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 15px;
            line-height: 1.3;
        }

        #tabla {
  width: 100px;
  margin: 0 auto;
}


    </style>
</head>
<body>




                @yield('contenet')




</body>
</html>
