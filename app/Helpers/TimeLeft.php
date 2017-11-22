<?php

namespace App\Helpers;

/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 12/7/15
 * Time: 5:19 PM
 */
class TimeLeft
{
    /*
     * $newWidth :: image size in width
     * $targetFile :: taget file and location
     * $originalFile  :: original file
     */
    public static function timeLeft($passTime){
        //echo $time;
        $time = time()-$passTime;
        $year = floor($time / (365*24*60*60));
        $month = floor($time / (30*24*60*60));
        $week = floor($time / (7*24*60*60));
        $day = floor($time /(24*60*60));
        $hour = floor($time /(60 * 60));
        $minute = floor(($time/60)%60);
        $seconds = $time%60;
        if($year != 0){
            return $year.' year ago';
        }
        elseif($month != 0){
            return $month.' month ago';
        }
        elseif($week != 0){
            return $week.' week ago';
        }
        elseif($day != 0){
            return $day.' day ago';
        }
        elseif($hour != 0){
            return $hour.' hour ago';
        }
        elseif($minute != 0){
            return $minute.' minutes '.$seconds.' seconds ago';
        }
        else{
            return $seconds.' seconds ago';
        }
        //return $hour.' hour '.$minute.' minutes '.$seconds.' seconds ago';
    }
}