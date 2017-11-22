<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/25/16
 * Time: 1:46 PM
 */

namespace Modules\Admin\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class ExpenseSubHead extends Model
{
    protected $table = 'expense_subhead';

    protected $guarded = [];

    // TODO :: boot
    // boot() function used to insert logged user_id at 'created_by' & 'updated_by'

    public static function boot(){
        parent::boot();
        static::creating(function($query){
            if(Auth::check()){
                $query->created_by = Auth::user()->id;
            }
        });
        static::updating(function($query){
            if(Auth::check()){
                $query->updated_by = Auth::user()->id;
            }
        });
    }
    public function expense_head(){
        return $this->belongsTo("Modules\Admin\Models\ExpenseHead","expense_head_id","id");
    }
}