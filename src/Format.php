<?php

namespace RDuuke\Newbie;

use Illuminate\Database\Eloquent\Model;

class Format extends Model{

    protected $table = 'formats';
    protected $fillable = ['name', 'description'];

    public function files()
    {
       return $this->hasMany('RDuuke\Newbie\File');
    }

    public function types()
    {
        return $this->belongsTo('RDuuke\Newbie\Type');
    }
}