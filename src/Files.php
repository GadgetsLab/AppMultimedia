<?php
/**
 * Created by PhpStorm.
 * User: SrDaniel
 * Date: 08/09/2016
 * Time: 9:13
 */
namespace RDuuke\Newbie;
use Illuminate\Database\Eloquent\Model;

class Files extends Model{

    protected $table="files";
    protected $fillable = ['title', 'description', 'url', 'id_format', 'id_user', 'id_materia'];

    public function format()
    {
        return $this->belongsTo('RDuuke\Newbie\Format');
    }
}