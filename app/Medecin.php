<?php

namespace App;

use App\Notifications\Medecin\MedecinResetPassword;
use App\Notifications\Medecin\MedecinVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Jahondust\ModelLog\Traits\ModelLogging;

class Medecin extends Authenticatable
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
        $this->notify(new MedecinResetPassword($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new MedecinVerifyEmail);
    }

    /**
     * Eloquent: Relationships
     */
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    /**
     * Eloquent: Relationships
     */
    public function consultations()
    {
        return $this->hasMany('App\Consultation');
    }
}
