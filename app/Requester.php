<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Requester
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $email
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Requester whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Requester whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Requester whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Requester whereUpdatedAt($value)
 */
class Requester extends Model
{
    protected $fillable = ['email'];
}
