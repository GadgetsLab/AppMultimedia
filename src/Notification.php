<?php
/**
 * Created by PhpStorm.
 * User: SrDaniel
 * Date: 03/10/2016
 * Time: 12:48
 */

namespace RDuuke\Newbie;

use Illuminate\Database\Eloquent\Model;


class Notification extends Model
{
    protected $table='notifications';
    protected $fillable = ['notification_id', 'state', 'type'];

    public function shared()
    {
        return $this->belongsTo('RDuuke\Newbie\Shared', 'notification_id');
    }

    public function  comment(){
        return $this->belongsTo('RDuuke\Newbie\Comment', 'notification_id');
    }

}