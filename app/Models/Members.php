<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Members extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [

        'clientid',
        'fullname',
        'address',
        'dateofbirth',
        'age',
        'gender',
        'cellnumber',
        'branch_name'
    ];

    public function tickets()
    {
        return $this->hasMany(Tickets::class);
    }

    
}
