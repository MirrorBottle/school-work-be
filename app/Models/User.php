<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'user_has_roles');
    }

    public function loans()
    {
        return $this->hasMany('App\Models\Loan');
    }

    /**
     * Wrapping the users data and throw it to the controller
     *
     * @return array
     */
    public static function listOfUsers()
    {
        $users = User::all();

        foreach ($users as $key => $user) {
            $data[$key]['id'] = $user->id;
            $data[$key]['name'] = $user->name;
            $data[$key]['gender'] = User::getUserGender($user);
            $data[$key]['email'] = $user->email;
            $data[$key]['phoneNumber'] = $user->phone_number;
            $data[$key]['joinDate'] = date('d-m-Y', strtotime($user->join_date));
        }

        return $data;
    }

    public static function getUserGender($user)
    {
        return $user->gender === 0 ? 'Laki-laki' : 'Perempuan';
    }
}
