<?php
/**
 * Created by PhpStorm.
 * User: SrDaniel
 * Date: 28/09/2016
 * Time: 20:49
 */

namespace RDuuke\Newbie;

use Illuminate\Database\Eloquent\Model;


class Shared extends Model
{

    protected $table = 'shareds';
    protected $fillable = ['of_who', 'for_who', 'file_id'];

}