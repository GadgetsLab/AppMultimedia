<?php

namespace RDuuke\Newbie;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = 'comments';

    protected $fillable = ['comment', 'for_who', 'file_id', 'of_who'];

    protected $hidden = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('RDuuke\Newbie\Type');
    }

}