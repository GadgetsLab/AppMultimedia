<?php

namespace RDuuke\Newbie;

use Illuminate\Database\Eloquent\Model;

class Format extends Model{

    protected $table = 'format';
    protected $fillable = ['name', 'description'];
}