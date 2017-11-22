<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/25/16
 * Time: 1:46 PM
 */

namespace Modules\Ticketing\Models;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;


class ExpenseDetails extends Model
{
    protected $table = 'expense_details';

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
        return $this->belongsTo('Modules\Admin\Models\ExpenseHead', 'expense_head_id', 'id');
    }
    public function expense_subhead(){
        return $this->belongsTo('Modules\Admin\Models\ExpenseSubHead', 'expense_subhead_id', 'id');
    }
}