<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\Ik;
use App\Models\Kk;
use Illuminate\Http\Request;

class PerkinController extends Controller
{
    public function index()
    {
        $dataPerkin = Kk::select('tb_kk.*', 'tb_ik.*', 'tb_ss.sasaran')
                        ->join('tb_ik', 'tb_kk.kode_ik', '=', 'tb_ik.kode_ik')
                        ->join('tb_ss', 'tb_ik.ss_id', '=', 'tb_ss.kode_ss')
                        ->get();

        return view('reports.perkin', compact('dataPerkin'));
    }
}
