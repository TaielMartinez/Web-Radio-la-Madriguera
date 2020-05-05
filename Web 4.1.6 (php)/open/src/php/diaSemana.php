<?php

    switch (date('N')) {
        case 1:
            $diaSemana = 'lunes';
        break;
        case 2:
            $diaSemana = 'martes';
        break;
        case 3:
            $diaSemana = 'miercoles';
        break;
        case 4:
            $diaSemana = 'jueves';
        break;
        case 5:
            $diaSemana = 'viernes';
        break;
        case 6:
            $diaSemana = 'sabado';
        break;
        case 7:
            $diaSemana = 'domingo';
        break;
    
        default:
            break;
    }

?>