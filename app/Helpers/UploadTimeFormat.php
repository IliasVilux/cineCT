<?php

namespace App\Helpers;

use DateTime;

class UploadTimeFormat
{

    public static function timeFilter($fecha)
    {

        $fecha_inicio = $fecha;

        if ($fecha_inicio == null) {
            return false;
        }

        // no devuelve la diferencia de tiempo que hay entre dos mechas
        $timeAgo = $fecha_inicio->diff(new DateTime(date("Y-m-d") . " " . date('H:i:s')));

        
        //Obtenemos la diferencia del mes, el dia, la hora , el minuto y el segundo de la fecha de publicacion comparando con la fecha actual
        $month = $timeAgo->m; //mes = [01-12];
        $day = $timeAgo->d; //dias = [01-31]
        $hour = $timeAgo->h; //horas = [00-23];
        $minute = $timeAgo->i;//minutos = [00-59]
        $second = $timeAgo->s; //segundos = [00-59];
        
        $monthKeys = ['mes', 'meses'];
        $dayKeys = ['dia', 'dias'];
        $hourKeys = ['hora', 'horas'];
        $minuteKeys = ['minuto', 'minutos'];
        $secondKeys = ['segundo', 'segundos'];
        
        if($month == 00){
            $msj = $month .' '. $monthKeys[1];
            if($day == 00){
                $msj = $day .' '. $dayKeys[1];
                if($hour == 00){
                    $msj = $hour .' '. $hourKeys[1];
                    if($minute == 00){
                        $msj = $minute .' '. $minuteKeys[1];
                        if($second == 00){
                            $msj = $second.' '.$secondKeys[1];
                        }else{
                            if($second == 01){
                                $msj = $second.' '. $secondKeys[0];
                            }else{
                                $msj = $second.' '. $secondKeys[1];
                            }
                        }
                    }else{
                        if($minute == 01 ){
                            $msj = $minute .' '. $minuteKeys[0];
                        }else{
                            $msj = $minute .' '. $minuteKeys[1];
                        }
                    }
                }else{
                    if($hour == 01){
                        $msj = $hour .' '. $hourKeys[0];
                    }else{
                        $msj = $hour .' '. $hourKeys[1];
                    }
                }
            }
            else{
                if($day == 01){
                    $msj = $day .' '. $dayKeys[0];;
                }else{
                    $msj = $day .' '. $dayKeys[1];;
                }
            }
        }else{
            if($month == 01){
                $msj = $month .' '. $monthKeys[0];
            }else{
                $msj = $month .' '. $monthKeys[1];
            }
        }

        return 'Hace ' .$msj;
       

    }
}
