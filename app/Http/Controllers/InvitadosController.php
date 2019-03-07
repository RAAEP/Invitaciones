<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Invitados as INVITADO;


class InvitadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $invitado=\App\Invitados::all();
        return view('datos.MuestraInvitados',compact('invitado'));
    }


    //Método para mostrar datos de la tabla Invitados.
    public function mostrartabla (){

    $invitado = \App\Invitados::all();
    return view('index',compact('invitado'));
    }



    public function Mostrar (){


        $invitado = INVITADO::paginate(10);
        return view('datos.MuestraInvitados',compact('invitado'));
    }

/**Método para crear archivos PDF */
    public function pdf($id,$ds)
    {
        /**
         * toma en cuenta que para ver los mismos
         * datos debemos hacer la misma consulta
         * para vizualizar es stream
         * @var inv mandado a la página invita que se encuentra en la carpeta pdf.
         * @param $id es el para buscar a la persona y extraer sus datos.
         *
        **/
        for ($i=1; $i < 3 ; $i++) {
             //Variable que almacena los datos de la persona seleccionada.
        $inv = \App\Invitados::find($id);
        //Creamo una nueva instancia del PDF
        $pdf = new PDF ();
        //Variable que almacena la cargar la página html para convertir en pdf y al mismo tiempo manda la variable inv, a la pa´gina invita.
        $pdf = PDF::loadView('pdf.invita', compact('inv'));
        //Tamaño de papel de nuestro pdf en este caso es tamaño carta
        $pdf->setPaper('letter','portrait');
        //retorna la muestra del pdf con el nombre y la extención pdf
        return $pdf->stream('listado.pdf');
        }

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

    public function visualizar ($id,$ds){

        $invitaci = \App\Invitaciones::find($ds);
        $inv = \App\Invitados::find($id);

        return view('invitacion',compact('inv','invitaci'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*Esto se utiliza cuando hay muchos datos por registrar.
        Invitados::create($request->all());
        return redirect('registrar');*/
        $invitado = new \App\Invitados;

        $invitado->nombre=$request->get('nombre');
        $invitado->puesto=$request->get('puesto');
        $invitado->institucion=$request->get('institucion');
        $invitado->save();
        return redirect('registro')->with('success', 'Information has been added');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        INVITADO::find($id)->delete();


        return redirect()->route('registro.index')
                        ->with('success','Product deleted successfully');
    }
}
