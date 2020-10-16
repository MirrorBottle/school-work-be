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
     * Wrapping the users data
     *
     * @return array
     */
    public static function listOfUsers()
    {
        $users = User::all();

        foreach ($users as $key => $user) {
            $data[$key]['id'] = $user->id;
            $data[$key]['name'] = $user->name;
            $data[$key]['gender'] = get_gender_name($user);
            $data[$key]['email'] = $user->email;
            $data[$key]['phoneNumber'] = $user->phone_number;
            $data[$key]['joinDate'] = indonesian_date_format($user->join_date);
        }

        return $data;
    }

    /**
     * Get the user role name by the collection of user data
     *
     * @param  mixed $user
     * @return string
     */
    public static function getUserRoleName($user)
    {
        foreach ($user->roles as $key => $role) {
            return $role->name;
        }
    }

    /**
     * Wrapping the user details data
     *
     * @param  mixed $id
     * @return array
     */
    public static function detailsOfUser($id)
    {
        $user_details = User::findOrFail($id);

        $data['id'] = $user_details->id;
        $data['name'] = $user_details->name;
        $data['gender'] = get_gender_name($user_details);
        $data['email'] = $user_details->email;
        $data['phoneNumber'] = $user_details->phone_number;
        $data['joinDate'] = indonesian_date_format($user_details->join_date);
        $data['birthDate'] = indonesian_date_format($user_details->birth_date);
        $data['job'] = indonesian_date_format($user_details->job);
        $data['loans'] = Loan::getLoansDataByUserId($user_details->id);

        return $data;
    }

    /**
     * Wrapping the employees data
     *
     * @return array
     */
    public static function listOfEmployees()
    {
        $employees = User::whereHas('roles', function ($query) {
            $query->where('role_id', 2);
        })->get();

        foreach ($employees as $key => $employee) {
            $data[$key]['id'] = $employee->id;
            $data[$key]['name'] = $employee->name;
            $data[$key]['gender'] = get_gender_name($employee);
            $data[$key]['email'] = $employee->email;
            $data[$key]['phoneNumber'] = $employee->phone_number;
            $data[$key]['joinDate'] = indonesian_date_format($employee);
        }

        return $data;
    }

    /**
     * Wrapping the employee details data
     *
     * @param  mixed $id
     * @return array
     */
    public static function detailsOfEmployee($id)
    {
        $employee_details = User::findOrFail($id);

        $data['id'] = $employee_details->id;
        $data['name'] = $employee_details->name;
        $data['gender'] = get_gender_name($employee_details);
        $data['email'] = $employee_details->email;
        $data['phoneNumber'] = $employee_details->phone_number;
        $data['joinDate'] = indonesian_date_format($employee_details->join_date);
        $data['birthDate'] = indonesian_date_format($employee_details->birth_date);
        $data['job'] = $employee_details->job;
        $data['deposits'] = Deposit::getDepositDataByUserId($employee_details->id);

        return $data;
    }
}
