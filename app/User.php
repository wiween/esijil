<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $ic_number
 * @property string $phone_number
 * @property string $avatar
 * @property string $role
 * @property int $access_power
 * @property string $remark
 * @property string $status
 * @property string $deleted_at
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Query\Builder|\App\User whereAccessPower($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereAvatar($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereIcNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRemark($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRole($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\AuditTrail[] $audit
 * @property string $enrolled_at
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEnrolledAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Psychometric[] $psychometric
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Organization[] $organization
 * @property-read \App\UploadPdf $uploadpdf
 */
class User extends Authenticatable
{
    const USER_TYPE_PB = 'PB';
    const USER_TYPE_SLDN = 'SLDN';
    const USER_TYPE_NDT = 'NDT';
    const USER_TYPE_PPT = 'PPT';

    use Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'ic_number', 'phone_number',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // User has many audit trails recordd
    public function audit()
    {
        return $this->hasMany('App\AuditTrail');
    }

}














