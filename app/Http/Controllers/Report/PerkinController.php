<?php

namespace App\Http\Controllers\Report;

use PDF;
use App\Http\Controllers\Controller;
use App\Models\Kk;

class PerkinController extends Controller
{
    public function index()
    {
        $dataPerkin = Kk::select('tb_kk.*', 'tb_ik.*', 'tb_ss.sasaran')
            ->join('tb_ik', 'tb_kk.kode_ik', '=', 'tb_ik.kode_ik')
            ->join('tb_ss', 'tb_ik.ss_id', '=', 'tb_ss.kode_ss')
            ->where([
                ['tb_kk.verifikasi_pimpinan', '=', KK::DISETUJUI],
                ['tb_kk.verifikasi_kegiatan', '=', KK::DISETUJUI],  
            ])
            ->get();


        return view('reports.perkin', compact('dataPerkin'));
    }

    public function cetakPdf()
    {
        $dataPerkin = Kk::select('tb_kk.*', 'tb_ik.*', 'tb_ss.sasaran')
            ->join('tb_ik', 'tb_kk.kode_ik', '=', 'tb_ik.kode_ik')
            ->join('tb_ss', 'tb_ik.ss_id', '=', 'tb_ss.kode_ss')
            ->where([
                ['tb_kk.verifikasi_pimpinan', '=', KK::DISETUJUI],
                ['tb_kk.verifikasi_kegiatan', '=', KK::DISETUJUI],  
            ])
            ->get();
        $dataPerkin = $dataPerkin->groupBy('ss_id');
        // return view('reports.pdf.perkin', compact('dataPerkin'));
        $pdf = PDF::loadView('reports.pdf.perkin',compact('dataPerkin'));
        return $pdf->setOrientation('landscape')->stream('perkin.pdf');
    }
}
