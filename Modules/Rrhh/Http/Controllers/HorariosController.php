<?php

namespace Modules\Rrhh\Http\Controllers;

use Modules\Rrhh\Entities\Horario;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

//use App\Horario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Validator;
class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $hours=Horario::all();
        //dd($hours);
        $title="Horarios";
        return view('rrhh::scarrhh.schedule.index',compact('hours','title'));
    }

    public function meses()
    {
        $fecha = Carbon::now()->format('Y-m-d');
        $now = Carbon::now()->format('day');
        $date = Carbon::parse($fecha)
            ->addSeconds(16)
            ->format('Y-m-d H:i:s');
        //dd($fecha, $date, $now);
        $meses = [
            ["nombre"=>"Enero"],
            ["nombre"=>"Febrero"],
            ["nombre"=>"Marzo"],
            ["nombre"=>"Abril"],
            ["nombre"=>"Mayo"],
            ["nombre"=>"Junio"],
            ["nombre"=>"Julio"],
            ["nombre"=>"Agosto"],
            ["nombre"=>"Septiembre"],
            ["nombre"=>"Octubre"],
            ["nombre"=>"Noviembre"],
            ["nombre"=>"Diciembre"]
        ];
        $title="Meses";
        return view('rrhh::scarrhh.vistasHojaCalculo.meses', compact('title', 'fecha', 'meses'));
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hour=new Horario($request->all());

        $bool= Validator::make($request->all(),[
            "start_time" => "required",
            "end_time" => "required",
            "late_minutes" => "required|numeric|min:0|max:60",
            "early_minutes" => "required|numeric|min:0|max:420",
            "start_input" => "required",
            "end_input" => "required",
            "start_output" => "required",
            "end_output" => "required",
            "work_day" => "required|numeric|min:0.1|max:30",
            "name" => "required",
            "color" => "required",
        ]);
        if($bool->fails()){
            return redirect()->back()->withErrors($bool->errors());
        }
        $hour->save();
        $notify=[
            "type"=>"success",
            "message"=>'El Horario '.$hour->name.' a sido registrado correctamente'
        ];
        return redirect()->back()->with("notify",$notify);
    }
    public function update(Request $request)
    {
        $bool= Validator::make($request->all(),[
            "start_time" => "required",
            "end_time" => "required",
            "late_minutes" => "required|numeric|min:0|max:60",
            "early_minutes" => "required|numeric|min:0|max:420",
            "start_input" => "required",
            "end_input" => "required",
            "start_output" => "required",
            "end_output" => "required",
            "work_day" => "required|numeric|min:0.1|max:30",
            "name" => "required",
            "color" => "required",
        ]);

        if($bool->fails()){
            return redirect()->back()->withErrors($bool->errors());
        }
        $hour = Horario::find($request->get('id_edit'));
        $hour->fill($request->all());
        $hour->save();
        $notify=[
            "type"=>"success",
            "message"=>'El Horario '.$hour->name.' a sido Editado correctamente'
        ];
        return redirect()->back()->with("notify",$notify);
    }
    
 public function getSchedule(Request $request){
        $id=$request->id;

        $hour=Horario::find($id);

        $json[]=[
            "id" => $hour->id,
            "name" => $hour->name,
            "start_time" => $hour->start_time,
            "end_time" => $hour->end_time,
            "late_minutes" => $hour->late_minutes,
            "early_minutes" => $hour->early_minutes,
            "start_input" => $hour->start_input,
            "end_input" => $hour->end_input,
            "start_output" => $hour->start_output,
            "end_output" => $hour->end_output,
            "work_day" => $hour->work_day,
            "sum" => $hour->sum,
            "color" => $hour->color
        ];
        return $json;
    }
    public function getHorario(Request $request){
       // $id=$request->id;

        $hour=Horario::all();

        return response()->json($hour);
        //return $hour;
    }


    public function deleteShedule(Request $request){
        $id=$request->id;
        $item=Horario::find($id);
        $item->delete();
        return response()->json(["resp"=>200]);
    }

    public function getmeses()
    {
        $fecha = Carbon::now()->format('Y-m-d');
        dd($fecha);
        $hours=Horario::all();
        //dd($hours);
        $title="Horarios";
        return view('rrhh::scarrhh.schedule.index',compact('hours','title'));
    }
}


