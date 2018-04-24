<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class MahasiswaController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mahasiswa $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mahasiswa $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Mahasiswa $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mahasiswa $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }

    public function performa()
    {
        return view('performa');
    }

    public function matkulMengulang()
    {
        return view('matkul-mengulang');
    }

    public function detailMatkulMengulang()
    {
        return view('detail-matkul-mengulang', [
            'students' => Mahasiswa::all()
        ]);
    }

    public function chart()
    {
        $result = \DB::table('mahasiswa')
            ->select(\DB::raw('count(*) as jumlah_mahasiswa, kelas'))
            ->groupBy('kelas')
            ->get();
        return response()->json($result);
    }

    public function importExcel()
    {
        if (Input::hasFile('file')) {
            $path = Input::file('file')->getRealPath();
            $data = \Excel::load($path, function ($reader) {
            })->get();
            dd($data);
            if (!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
                    $insert[] = [
                        'STUDENTID' => $value->STUDENTID,
                        'FULLNAME' => $value->FULLNAME,
                        'CLASS' => $value->CLASS,
                        'STUDYPROGRAMNAME' => $value->STUDYPROGRAMNAME,
                        'FACULTYNAME' => $value->FACULTYNAME,
                        'STUDENTSCHOOLYEAR' => $value->STUDENTSCHOOLYEAR,
                        'STUDENTTYPENAME' => $value->STUDENTTYPENAME,
                        'SELECTIONPATHNAME' => $value->SELECTIONPATHNAME,
                        'TAK_POINT' => $value->TAK_POINT,
                        'PEKERJAANAYAH' => $value->PEKERJAANAYAH,
                        'PENGHASILANAYAH' => $value->PENGHASILANAYAH,
                        'PEKERJAANIBU' => $value->PEKERJAANIBU,
                        'PENGHASILANIBU' => $value->PENGHASILANIBU,
                        'SENIORHIGHSCHOOL' => $value->SENIORHIGHSCHOOL
                    ];
                }
                if (!empty($insert)) {
                    DB::table('mahasiswa')->insert($insert);
                    \Session::flash('success', 'File Success Imported');
//                    alert()->success('Data Wisata Berhasil Di Import', 'Berhasil');
                }
            }
        } else {
            \Session::flash('warning', 'Fail');
        }
        return redirect()->back();
    }
}
