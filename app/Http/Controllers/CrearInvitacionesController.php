<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Invitaciones;
use App\Invitados;

class CrearInvitacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * ***************Método seleccionarInvitacion que muestra una lista de las invitaciones para utilizar.***************
     *
     * @return SelecInvitacion que es una vista, junto con la @var invitado
     */
    public function seleccionarInvitacion(){

        //Obtiene todo los datos de la tabla invitaciones y lo almacena en la @var invitado
        $invitado = Invitaciones::all();

        //Nos muestra la página SelecInvitacion, a la cual le compactamos los datos de la varible invitado, para ser utilizados.
        return view('SelecInvitacion',compact('invitado'));

    }

    /**
     * ********************Método seleccionarInvitados que muestra una lista de los invitados para seleccionar.*****************
     *@param id
     * @return SelecInvitado que es una vista, junto con la @var invitado y la @var invitacion
     */
    public function seleccionarInvitados($id){
        //Obtine los datos de la tabla invitaciones dependiendo de el id
        $invitacion = Invitaciones::find($id);
        //Obtiene todos los datos de la tabla invitados y los almacena en la varible $invitados.
        $invitados = Invitados::paginate(30);
        //Nos muestra la página SelecInvitado, con los valores de las varibles 'invitados'y 'invitacion'.
        return view('SelecInvitado',compact('invitados','invitacion'));
    }

     /**
     * **********************Método visualizar que muestra la página invitacion.***********************************
     * @param id
     * @param ds
     *
     * @return invitacion que es una vista, junto con la @var invitado y la @var invitacion
     */
    public function visualizar ($id,$ds){
        //Obtine los datos de la tabla invitaciones dependiendo de el id
        $invitacion = Invitaciones::find($ds);
        //Obtine los datos de la tabla invitado dependiendo de el id
        $invitado = Invitados::find($id);
        //Nos muestra la página invitacion, con los valores de las varibles 'invitados'y 'invitacion'.
        return view('invitacion',compact('invitado','invitacion'));
    }


    /**
         * **************************** Método pdf que crea un archivo pdf****************************
         * para vizualizar es stream
         * para descargar es download
         * @param id , @param ds
         *
        **/
    public function pdf($id,$ds)
    {
        //Variable que almacena los datos de la persona seleccionada.
        $invitacion = Invitaciones::find($ds);
        $invitado = Invitados::find($id);
        //Creamo una nueva instancia del PDF
        $pdf = new PDF ();
        //Variable que almacena la cargar la página html para convertir en pdf y al mismo tiempo manda la variable inv, a la pa´gina invita.
        $pdf = PDF::loadView('pdf.invita', compact('invitacion','invitado'));
        //Tamaño de papel de nuestro pdf en este caso es tamaño carta
        $pdf->setPaper('letter','portrait');
        //retorna la muestra del pdf con el nombre y la extención pdf
        return $pdf->stream('listado.pdf');
    }

    /**
         * **************************** Método multiple que crea varios archivos pdf****************************
         * para vizualizar es stream
         * para descargar es download
         * @param id , @param request
         *
        **/
    public function multiple($id,Request $request){

        //Obtine todos los valores del los checkbox seleccionados y los almacena como un array en la varible check
        $check = (array) $request->get('check');
        /**Obtine todos datos de la tabla Invitados y los almacena en la varible @var Invitados */
        $invitados = Invitados::all();
        /**Obtine los datos de la tabla invitaciones segun su id */
        $invitacion = Invitaciones::find($id);

        foreach ($invitados as $invitado){
            foreach ($check as $id){
                if ($invitado->id == $id){

                    $in [] = $invitado;
                }
            }
        }
         //Creamo una nueva instancia del PDF
         $pdf = new PDF ();
         //Variable que almacena la cargar la página html para convertir en pdf y al mismo tiempo manda la variable inv, a la pa´gina invita.
         $pdf = PDF::loadView('prueba', compact('in','invitacion'));
         //Tamaño de papel de nuestro pdf en este caso es tamaño carta
         $pdf->setPaper('letter','portrait');
         //retorna la muestra del pdf con el nombre y la extención pdf
         return $pdf->stream('listado.pdf');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function store(Request $request)
    {
        //

        $j = (array) $request->get('favorite');
        $invitados = Invitados::all();


        return view('prueba',compact('j','invitados'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
