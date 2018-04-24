<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $fillable = ['STUDENTID',
        'FULLNAME',
        'CLASS',
        'STUDYPROGRAMNAME',
        'FACULTYNAME',
        'STUDENTSCHOOLYEAR',
        'STUDENTTYPENAME',
        'SELECTIONPATHNAME',
        'TAK_POINT',
        'PEKERJAANAYAH',
        'PENGHASILANAYAH',
        'PEKERJAANIBU',
        'PENGHASILANIBU',
        'SENIORHIGHSCHOOL'];
}
