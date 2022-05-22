<?php

namespace App\Http\Controllers;

use App\Models\KKmentri;
use App\Models\Ik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KKmentriController extends Controller
{
    public function index()
    {
       $data = DB::SELECT( DB::RAW("SELECT tb_kk.*,tb_ik.indikator_kinerja FROM tb_kk INNER JOIN tb_ik ON tb_kk.kode_ik = tb_ik.kode_ik"));
        $dataIK = Ik::get();
        return view('kkmenteri.index',compact('data','dataIK'));
    }
    public function get()
    {
        $dataIK = Ik::select('kode_ik')->pluck('kode_ik');
        return $dataIK;
    }
    public function del(Request $x)
    {
        KKmentri::where('id', $x->id)->delete();
        return response()->json([$x->id]);
    }
    public function add(Request $x)
    {
        $req = [
            "kode_ik" => $x->kode_ik,
            "pk_menteri" => $x->pk_menteri,
            "satuan" => $x->satuan,
            "bobot" => $x->bobot
        ];
        KKmentri::UpdateOrCreate(["id" => $x->id],$req);
        return response()->json(["SUKSES"]);
    }

}
