<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Info del servicio internacional.
     * @return mixed
     * Created by  <Rhiss.net>
     */
    public function info()
    {
        return $this->hasOne(InfoUser::class);
    }

    public function scopeDatatable($query)
    {
        return $query->join('info_users', 'info_users.user_id', '=', 'users.id')
                     ->select([
                         'users.id',
                         'users.name',
                         'users.email',
                         'info_users.phone as info_users.phone'
                     ]);

    }

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

    /**
     * @param string $token
     * Created by <Rhiss.net>
     */
    public function sendPasswordResetNotification($token)
    {
        $data          = $this->toArray();
        $data['token'] = $token;

        Mail::send('email.forgot', $data, function ($message) use ($data) {
            $admin = User::find(1)->name;
            $message->subject('Petición de cambio de contraseña desde ' . get_info('title_meta'));
            $message->from(get_info('email'), $admin);
            $message->to($data['email']);
        });
    }
}
