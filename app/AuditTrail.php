<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\AuditTrail
 *
 * @property int $id
 * @property string $ip
 * @property string $url
 * @property string $flag
 * @property string $note
 * @property int $user_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\AuditTrail whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AuditTrail whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AuditTrail whereFlag($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AuditTrail whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AuditTrail whereIp($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AuditTrail whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AuditTrail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AuditTrail whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AuditTrail whereUserId($value)
 * @mixin \Eloquent
 * @property string $remember_token
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\AuditTrail whereRememberToken($value)
 */
class AuditTrail extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];


    // each audit trails record, belong to ONE user only
    public function user() {
        return $this->belongsTo('App\User');
    }
}

















