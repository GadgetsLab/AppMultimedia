<?php
/**
 * Created by PhpStorm.
 * User: SrDaniel
 * Date: 21/09/2016
 * Time: 11:54
 */

namespace RDuuke\Newbie;


use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';
    protected $fillable = ['type'];

    public function formats()
    {
        return $this->hasMany('RDuuke\Newbie\Format');
        //return $this->belongsTo('RDuuke\Newbie\Format');
    }
}