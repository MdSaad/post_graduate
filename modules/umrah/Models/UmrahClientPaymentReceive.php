<?php

namespace Modules\Umrah\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;


class UmrahClientPaymentReceive extends Model
{
    protected $table = 'umrah_client_payment_receive';

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

    public function relUmrahClientInfo()
    {
        return $this->belongsTo('Modules\Umrah\Models\UmrahClientInfo', 'umrah_client_information_id');
    }
}