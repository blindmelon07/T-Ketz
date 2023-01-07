<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Tickets extends Model 
{
    use HasFactory, HasRoles;




    protected $fillable = [
        'ticket_code',
        'quantity'



    ];
    public function member()
    {
        return $this->belongsTo(Members::class);
    }
}
