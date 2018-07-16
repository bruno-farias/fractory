<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PreOrder
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $requester
 * @property string|null $name
 * @property int|null $quantity
 * @property int|null $thickness
 * @property string|null $material
 * @property int $bending
 * @property int $threading
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreOrder whereBending($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreOrder whereMaterial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreOrder whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreOrder whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreOrder whereRequester($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreOrder whereThickness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreOrder whereThreading($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PreOrder whereUpdatedAt($value)
 */
class PreOrder extends Model
{
    protected $fillable = ['name', 'quantity', 'thickness', 'material', 'bending', 'threading'];
}
