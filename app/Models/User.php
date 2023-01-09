<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use PhpOption\None;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public static function boot()
    {
        parent::boot();

       self::created(function ($model) {
           $role_name = Role::find($model->role_id)->name;
       $model->assignRole($role_name);
           $model->save();
      });

      self::updated(function ($model) {
            $role = Role::find($model->role_id);
            $model->syncRoles([$role->name]);
            $model->role_id = $role->id;
           $role->save();
        });
    }
   
}
