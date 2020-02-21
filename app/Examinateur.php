<?php

namespace App;

use App\Notifications\Examinateur\ExaminateurResetPassword;
use App\Notifications\Examinateur\ExaminateurVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Jahondust\ModelLog\Traits\ModelLogging;

class Examinateur extends Authenticatable
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
        $this->notify(new ExaminateurResetPassword($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new ExaminateurVerifyEmail);
    }

    /**
     * Eloquent: Relationships
     * Responsable
     */
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    /**
     * Eloquent: Relationships
     * ECs = Examens_complimentaires
     */
    public function ECs()
    {
        return $this->hasMany('App\Examen_complimentaire');
    }

}
