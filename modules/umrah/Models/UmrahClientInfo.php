<?php

namespace Modules\Umrah\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;


class UmrahClientInfo extends Model
{
    protected $table = 'umrah_client_information';

    protected $guarded = [];


    // TODO :: boot
    // boot() function used to insert logged user_id at 'created_by' & 'updated_by'

    public static function boot()
    {
        parent::boot();
        static::creating(function ($query) {
            if (Auth::check()) {
                $query->created_by = Auth::user()->id;
            }
        });
        static::updating(function ($query) {
            if (Auth::check()) {
                $query->updated_by = Auth::user()->id;
            }
        });
    }

    public function relUmrahClientPaymentReceive()
    {
        return $this->hasMany('Modules\Umrah\Models\UmrahClientPaymentReceive', 'umrah_client_information_id');
    }

}