<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Ticket extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = ['members_id','ticket_code',];


    public function member()
    {
        return $this->belongsTo(Members::class);

    }
}
