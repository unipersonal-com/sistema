<?php

namespace Modules\Rrhh\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Rats\Zkteco\Lib\ZKTeco;
use \ZKLib\ZKLib;
use \ZKLib\User;
use App\Unidad;
use  Spatie\PdfToImage\Pdf;
class BioController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $zk = new ZKTeco('10.10.165.242',4370);

        //port 1470
        $zk->connect();
        //dd($zk);
        $zk1 = new ZKLib('10.10.165.242',4370);
        $ret = $zk1->connect();
        $capacity = $zk1->getFreeSize();

        $version=$zk1->getVersion();
        $sistem=$zk1->getOs();
        $plataform=$zk1->getPlatform();
        $user = $zk1->getUser();
        //dd(compact('capacity','version','sistem','plataform','user'));

    }
    public function pdf(){
        return view('rrhh::pdf.index');
    }
    public function pdftoimage(Request $request){

        $pdf = new Spatie\PdfToImage\Pdf($request->img);
        dd($pdf);
    }
}
