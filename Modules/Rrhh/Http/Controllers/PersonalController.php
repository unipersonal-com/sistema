<?php

namespace Modules\Rrhh\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Rrhh\Entities\Personal;
use App\Unidad;
use Jenssegers\Date\Date;
use App\Pedido;
use Modules\Presupuestos\Entities\Bitacora;
use App\Gestion;
use App\AdmiFlujo;
use App\Detalle;
use Modules\Almacen\Entities\File;
use Modules\Almacen\Entities\Control;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\FLujo;
use App\Flujodetalle;
use Carbon\Carbon;
class PersonalController extends Controller
{
  /**
   * Display a listing of the resource.
   * @return Renderable
   */
  public function index()
  {
    $title = 'contenido del personal';
    $personal = Personal::orderby('id', 'ASC')->get();
    $depart = ["la paz" => "LP", "oruro" => "OR", "chuquisaca" => "CH", "cochabamba" => "CB", "tarija" => "TR", "santa cruz" => "SC", "beni" => "BN", "Pando" => "PD", "Potosi" => "PT"];
   // return view('rrhh::administrador.personal.index', compact('title', 'personal', 'depart'));
    return view('rrhh::administrator.personal.index',compact('title','personals', 'depart'));
  }

  /**
   * Show the form for creating a new resource.
   * @return Renderable
   */
  public function create()
  {
    return view('rrhh::create');
  }

  /**
   * Store a newly created resource in storage.
   * @param Request $request
   * @return Renderable
   */
  public function store(Request $request)
  {
    $messages = [
      'nombres.required' => 'el campo es obligado',
      'apellidoP.required' => 'el campo es obligado',
      'apellidoM.required' => 'el campo es obligado',
      'ci.required' => 'el campo es obligado',
      'extension.required' => 'el campo es obligado',
    ];
    $request->validate([
      'nombres' => 'required',
      'apellidoP' => 'required',
      'apellidoM' => 'required',
      'ci' => 'required',
      'extension' => 'required',
    ], $messages);

    $personal = new Personal();
    $personal->nombres = $request->nombres;
    $personal->apellido_paterno = $request->apellidoP;
    $personal->apellido_materno = $request->apellidoM;
    $personal->ci = $request->ci;
    $personal->extension = $request->extension;
    $personal->save();
    $personal = Personal::all();
    if ($request->ajax()) {
      return response()->json(view('rrhh::app1.personal.dataR', compact('personal'))->render());
    }
  }

  public function getpersonal($id)
  {
    $personalE = Personal::find($id);
    $depart = ["la paz" => "LP", "oruro" => "OR", "chuquisaca" => "CH", "cochabamba" => "CB", "tarija" => "TR", "santa cruz" => "SC", "beni" => "BN", "Pando" => "PD", "Potosi" => "PT"];
    $personext = $personalE->extension;
    return response()->json(view('rrhh::app1.personal.dataEf', compact('personalE', 'personext', 'depart'))->render());
  }

  /**
   * Show the specified resource.
   * @param int $id
   * @return Renderable
   */
  public function show($id)
  {
    return view('rrhh::show');
  }

  /**
   * Show the form for editing the specified resource.
   * @param int $id
   * @return Renderable
   */
  public function edit($id)
  {
    return view('rrhh::edit');
  }

  /**
   * Update the specified resource in storage.
   * @param Request $request
   * @param int $id
   * @return Renderable
   */
  public function update(Request $request, $id)
  {
    $messages = [
      'nombres.required' => 'el campo es obligado',
      'apellido_paterno.required' => 'el campo es obligado',
      'apellido_materno.required' => 'el campo es obligado',
      'ci.required' => 'el campo es obligado',
      'extension.required' => 'el campo es obligado',
    ];
    $request->validate([
      'nombres' => 'required',
      'apellido_paterno' => 'required',
      'apellido_materno' => 'required',
      'ci' => 'required',
      'extension' => 'required',
    ], $messages);
    $personal = Personal::find($id);
    $personal->nombres = $request->nombres;
    $personal->apellido_paterno = $request->apellido_paterno;
    $personal->apellido_materno = $request->apellido_materno;
    $personal->ci = $request->ci;
    $personal->extension = $request->extension;
    $personal->save();
    $personal = Personal::orderBy('id', 'ASC')->get();
    if ($request->ajax()) {
      return response()->json(view('rrhh::app1.personal.dataR', compact('personal'))->render());
    }
  }

  /**
   * Remove the specified resource from storage.
   * @param int $id
   * @return Renderable
   */
  public function destroy($id)
  {
    //
  }
  public function credential($id)
  {
    //dd('aaa');
    $title = 'Mi Credencial';
    $show = Personal::findOrfail($id);
    //dd($show);
    return view('rrhh::administrator.personal.credencial.show', compact('title', 'show'));
  }

  //pedidos
  public function pedidos()
  {
    $title = "unidades";
    $pedido=Pedido::where([['estatus_pedidos','pedido'],['matped',true]])->pluck('unidad_solicitante')->toArray();
    $unidad = Unidad::whereIn('id',array_unique($pedido))->get();
    return view('rrhh::administrator.pedidos.index', compact('title', 'unidad'));
  }
  public function pedmatuni($id)
  {
    $pedido = Pedido::where([['unidad_solicitante', $id],['matped', true],['regularizacion',false],['estatus_pedidos','pedido']])->get();

    $title = "pedidos de material";
    return view('rrhh::administrator.pedidos.list', compact('title', 'pedido'));
  }
  public function showpedmat($id)
  {
    $seguimiento=Bitacora::where('pedido_id',$id)->get();
    $ped=Pedido::findOrfail($id);
    $title='datos del pedido';
    $flujos=Flujo::where('name','pedidos')->first();
    $files = File::where('pedido_id', $id)->get();
    $user=User::findOrfail($ped->persona_que_registra_pedido);
    $file=File::where([['pedido_id',$ped->id],['tipo','referencial']])->get();
    $valor=count($files);
    $fechaLiteral=Date::parse($ped->fecha)->format('l j F Y');
    return view('rrhh::administrator.pedidos.show',compact('title','ped','user','flujos','valor','files','fechaLiteral'));
  }
  public function get_unidades(Request $request)
  {
    $id = $request->id;
    $flujo = Flujo::findOrfail($id);
    $unidads = Flujodetalle::where('flujo_id', $flujo->id)->get();
    return response()->json($unidads);
  }
  public function detailsOrder(Request $request){
    $ped = Pedido::findOrfail($request->ordeData);
    $show = Detalle::where('pedido_id', $ped->id)->get();
    $user=User::findOrfail($ped->persona_que_registra_pedido);
    $unidades=[];
    $bitacoras=Bitacora::where([['pedido_id',$ped->id],['tipo','<>','presupuestos']])->get()->toArray();
    sort($bitacoras);
    $bitacoras=array_pad($bitacoras,4,null);
    $useruni=($bitacoras[0]==null)?null:Mifirma::where('user_id',$bitacoras[0]['firmado'])->get()->last();
    $userdaf=($bitacoras[1]==null)?null:Mifirma::where('user_id',$bitacoras[1]['firmado'])->get()->last();
    $useralmacen=($bitacoras[2]==null)?null:Mifirma::where('user_id',$bitacoras[2]['firmado'])->get()->last();
    $userecepcionado=($ped->personal_id==null)?null:Mifirma::where('user_id',$ped->personal_id)->get()->last();
    array_push($unidades,$useruni,$userdaf,$useralmacen,$userecepcionado);
    return response()->json(view('pedido.complemet.tab2',compact('ped','show','user','unidades','bitacoras'))->render());
  }
  public function traicingOrder(Request $request){
    $seguimiento = Bitacora::where('pedido_id', $request->ordeData)->get();
    return response()->json(view('pedido.complemet.tab3',compact('seguimiento'))->render());
  }
  public function infoadd(Request $request){
    $files = File::where('pedido_id', $request->ordeData)->get();
    return response()->json(view('pedido.complemet.tab1',compact('files'))->render());
  }
  public function actustate(Request $request)
  {
    if ($request->statusData=='anul') {
      $message=[
        'observacion.required'=>'La observación es requirida',
        'observacion.max'=>'La cantidad maxima de caracteres es de 191'
      ];
      $request->validate([
        'observacion'=>'required|max:191'
      ],$message);
    }
    $pedido=Pedido::findOrfail($request->pedido);
    if ($pedido->estatus_pedidos!='pedido') {
      return response()->json([
        'messageDifferent'=>'El pedido ya aprobado o anulado'
      ],422);
    }
    $fecha=Carbon::now()->toDateString();
    $flujo=Flujo::where('name','pedidos')->first();
    $detalles=Flujodetalle::where('flujo_id',$flujo->id)->orderBy('orden','asc')->first();
    $rules=[];
    if ($request->statusData=='aprov') {
      if ($pedido->tipo_pedido=='propios') {
        $pedidoPropios=$pedido->file->where('tipo','referencial')->count();
        if ($pedidoPropios < 1) {
          $rules['propios']='Se requiere como mínimo un documento de Información de recursos propios';
        }
      }
      if ($pedido->regularizacion==true) {
        $pedido_monto= $pedido->monto;
        if ($pedido_monto->monto<10000) {
          $factura=$pedido->files->where('tipo','factura')->count();
          if ($factura<0) {
            $rules['factura']='Se necesita una o más factura';
          }
        }elseif ($pedido_monto->monto>=10000 && $pedido_monto<20000) {
          if ($cotizacion<3) {
            $rules['cotizacion']='Se necesita tres cotizaciones';
          }
          if ($factura<1) {
            $rules['factura']='Se necesita una o más factura';
          }
        }elseif ($pedido_monto->monto >=20000 && $pedido_monto->monto < 50000){
          if ($cotizacion<3) {
            $rules['cotizacion']='Se necesita tres cotizaciones';
          }
          if ($factura<1) {
            $rules['factura']='Se necesita una o más factura';
          }
        }
      }
      if (count($rules)>0) {
        return response()->json($rules,422);
      }else{
        $pedido->estatus_pedidos = 'preaprobado';
        $pedido->save();
        $proceso = new Control();
        $proceso->fecha = $fecha;
        $proceso->pedido_id = $pedido->id;
        $proceso->de_donde = $pedido->unidad_solicitante;
        $proceso->a_donde = $detalles->unidad_id;
        $proceso->flujo = $flujo->id;
        $proceso->observacion = null;
        $proceso->estado = 'pendiente';
        $proceso->save();
        $bitacora = new Bitacora();
        $bitacora->pedido_id = $pedido->id;
        $bitacora->fecha = $fecha;
        $bitacora->de_donde = $proceso->de_donde;
        $bitacora->a_donde = $proceso->a_donde;
        $bitacora->firmado = Auth::user()->id;
        $bitacora->estatus_inicial = 'pedido';
        $bitacora->estatus_final = 'pendiente';
        $bitacora->observacion = null;
        $bitacora->tipo = 'unidad';
        $bitacora->save();
        return response()->json([
          'message'=>'Pedido Añadido correctamente'
        ]);
      }
    }elseif ($request->statusData=='anul') {
      $pedido->estatus_pedidos = 'anulado';
        $pedido->save();
        $proceso = new Control();
        $proceso->fecha = $fecha;
        $proceso->pedido_id = $pedido->id;
        $proceso->de_donde = $pedido->unidad_solicitante;
        $proceso->a_donde = $detalles->unidad_id;
        $proceso->flujo = $flujo->id;
        $proceso->observacion = null;
        $proceso->estado = 'pendiente';
        $proceso->save();
        $bitacora = new Bitacora();
        $bitacora->pedido_id = $pedido->id;
        $bitacora->fecha = $fecha;
        $bitacora->de_donde = $proceso->de_donde;
        $bitacora->a_donde = $proceso->a_donde;
        $bitacora->firmado = Auth::user()->id;
        $bitacora->estatus_inicial = 'pedido';
        $bitacora->estatus_final = 'pendiente';
        $bitacora->observacion = $request->observacion;
        $bitacora->tipo = 'unidad';
        $bitacora->save();
        return response()->json([
          'message'=>'Pedido anulado correctamente'
        ]);
    }
  }
  public function historyarticle(Request $request){
    $maganement=Carbon::now()->format('Y');
    $orderSt=Pedido::findOrFail($request->ordeData);
    $unitAr=User::findOrfail($orderSt->persona_que_registra_pedido)->unidad_id;
    $deta_Or_ped=Detalle::where('codigo_material',$request->codmat)
      ->whereHas('pedlist',function($query) use($maganement,$unitAr){
        $query->where([['gestion',$maganement],['unidad_solicitante',$unitAr],
          ['personal_id','<>',null]]);
    })->get();
    return response()->json([
      'deta_Or_ped'=>$deta_Or_ped
    ]);
  }

}
