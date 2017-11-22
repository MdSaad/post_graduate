<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/27/2017
 * Time: 10:59 AM
 */

namespace App\Helpers;


class DateQuery
{
    public static function query_by_date_range($model,$column,$from_date,$to_date){
        if(empty($from_date) && empty($to_date)){
            $result = $model;
        }elseif(empty($from_date) && !empty($to_date)){
            $result = $model->where($column,'like','%'.$to_date.'%');
        }elseif(!empty($from_date) && empty($to_date)){
            $result = $model->where($column,'like','%'.$from_date.'%');
        }elseif(!empty($from_date) && !empty($to_date)){
            $last = date('Y-m-d',(86400 + strtotime($to_date)));
            $result = $model->whereBetween($column,[$from_date,$to_date]);
        }
        return $result;
    }
}