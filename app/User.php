<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use  Konekt\AppShell\Models\User as VaniloUser;

class User extends VaniloUser
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];
}
