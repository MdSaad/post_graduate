<?php

namespace Modules\Ticketing\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class PassengersTicketInfo extends Model
{
    protected $table = 'passengers_ticket_information';
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

    public function relAirlines()
    {
        return $this->belongsTo('Modules\Admin\Models\Airlines', 'airlines_id');
    }

}