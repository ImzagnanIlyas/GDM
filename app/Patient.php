<?php

namespace App;

use App\Notifications\Patient\PatientResetPassword;
use App\Notifications\Patient\PatientVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Jahondust\ModelLog\Traits\ModelLogging;

class Patient extends Authenticatable
{
    use Notifiable;
    use ModelLogging;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PatientResetPassword($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new PatientVerifyEmail);
    }

    /**
     * Eloquent: Relationships
     */
    public function consultations()
    {
        return $this->hasMany('App\Consultation');
    }

}
