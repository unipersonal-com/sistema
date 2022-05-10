<?php

namespace App\Http\Controllers;

use App\Asistencia;
use Illuminate\Http\Request;
use Carbon\Carbon;
class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ciii = "13229219";
        $tipo_aa = "en hora";
        $asistenciass = Asistencia::where('ci_a', '=', $ciii)->get();
        //dd($asistenciass, $asistenciass->where('tipo_a','=', "salida"));
       // dd(Asistencia::all());
        return Asistencia::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Asistencia $asistencia)
    {
        //
        $fecha = Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->format('H:i');
        $hora_c = Carbon::now()->hour;
        $minuto = Carbon::now()->minute;

        $error_schedule = false;
        $message = "errorr";
        $tipo_a = "prueba";
        $estado_a = "prueba";
        $turno_a="mañana";
        
        if ($hora_c >=7 && $hora_c<20) {
          $error_schedule=true;
        }
        else{
          //return null;
          return response()->json($message="horas de registro no activos");
        }
        if ($error_schedule == true) {
          if ($hora_c>=7 && $hora_c<=13) {
            //$error_schedule = true;
            $turno_a="mañana";
            $message="agregado asistenciA entrada en la mañana";

            if ($hora_c>=7&&$hora_c<=9){
              $tipo_a = "entrada";
              if ($hora_c>=7&&$minuto>=1&&$hora_c<=8&&$minuto<=15) {
                $estado_a="en hora";
                $message="hh";
              }
              if($hora_c>=8&&$minuto>15 && $hora_c<=8&&$minuto<=30){
                $estado_a="atrasado";
                $message = "ss";
              }
              if($hora_c>=8&&$minuto>30 && $hora_c<9) {
                $estado_a="falta";
              }                  

            }elseif($hora_c>=12&&$hora_c<=13){
                $tipo_a = "salida";
                $message="agregado asistenciA salida en la mañana";
                $estado_a="salida turno mañana";

                /*
                if ($hora_c>=12&&$hora_c<=12&&$minuto<=15) {
                  $estado_a="en hora";
                  $message="hh";
                }
                if($hora_c>=12&&$minuto>15 && $hora_c<=3&&$minuto<=30){
                  $estado_a="salida despues de hora";
                  $message = "ss";
                }
                if($hora_c>=12&&$minuto>20 && $hora_c<13) {
                  $estado_a="salida tardia";
                  $message = "sff";
                }
                else{
                  return $message="registro de asistencia de salidas por la mañana ya cerradas";
                }*/
              }
              else {
                return response()->json($message="horas de registro por la mañana ya cerradas");
              }
          }elseif($hora_c>=14&&$hora_c<=19){
            //$error_schedule = true;
            $turno_a="tarde";
            $message="agregado asistenciA entrada en la tarde";

            if ($hora_c>=14&&$hora_c<=16){
              $tipo_a = "entrada";
              if ($hora_c>=14&&$hora_c<=14&&$minuto<=45) {
                $estado_a="en hora";
                $message="hh";
              }
              if($hora_c>=14&&$minuto>45 && $hora_c<=15&&$minuto<=1){
                $estado_a="atrasado";
                $message = "ss";
              }
              if($hora_c>=15&&$minuto>1 && $hora_c<=16) {
                $estado_a="falta";
              }
              else{
                return response()->json($message="registro de asistencia de entrada por la tarde ya cerradas");
              }

            }elseif($hora_c>=18&&$minuto>=30&&$hora_c<20){
                $tipo_a = "salida";
                $message="agregado asistencia salida en la tarde";
                $estado_a="salida";
                /*
                if ($hora_c>=18&&$minuto>=30&&$hora_c<=19&&$minuto<=1) {
                  $estado_a="en hora";
                  $message="hh";
                }
                if($hora_c>=19&&$minuto>1 && $hora_c<=3&&$minuto<=30){
                  $estado_a="despues de hora";
                  $message = "ss";
                }
                if($hora_c>=19&&$minuto>30 && $hora_c<20) {
                  $estado_a="salida muy tarde";
                  $message = "sff";
                }*/

              }
              else {
                return response()->json($message="horas de registro por la tarde cerradas");
              }
          }
        }
        else{
          
          return response()->json($message="horas no establecidas para registro");
        }

        $asistenciass = Asistencia::where('ci_a', '=', $request->ci_a)->where('turno_a','=', $turno_a)->where('tipo_a','=', $tipo_a)->first();
        // $asistenciasss = $asistenciass::where('tipo_a', '=', $tipo_a)->first();
         //$cis = select('ci_a', 'FROM', Asistencia::where('ci_a', '=', $request->ci_a));
 
         //dd($asistenciass->Where('tipo_a', '=', $tipo_a));
       //  dd($asistenciass);
         if ($asistenciass!=null) {
          /* $asistenciasss = $asistenciass::where('tipo_a', '=', "entrada")->get();
           if ($asistenciasss != null) {
             return $message="el ci $request->ci_a  ya esta registrado en la $tipo_a"; 
             dd($asistenciass, $asistenciasss);
           }*/
           return response()->json($message="el ci $request->ci_a  ya esta registrado en la $tipo_a y en el turno de: $turno_a.");
           //dd($asistenciass);
         }
       /*  else {
           $message="registrado";
         }*/

        //dd($request->all());
        $new=new Asistencia();
        $new->id_persona=$request->id_persona;
        $new->ci_a=$request->ci_a;
        $new->turno_a=$turno_a;
        $new->tipo_a=$tipo_a;
        $new->estado_a=$estado_a;
        $new->fecha=$fecha;
        $new->hora=$hora;
        //dd($new);
        $new->save();
        return response()->json([$new,$message, $turno_a]);
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
        return Asistencia::find($id);
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
        return Asistencia::find($id)->update($request->all());
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
        return Asistencia::destroy($id);
    }
}
