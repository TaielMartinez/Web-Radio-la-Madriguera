<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programas extends Model
{
    protected $table='programas';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'nombre',
        'subtitulo',
        'descripcion',
        'foto',
        'horario',
        'redesSociales',
        'descripcionLarga',
        'tipo'
    ];

    protected $guarded =[

    ];

}
