<?php

namespace RDuuke\Newbie;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = 'comments';

    protected $fillable = ['comment', 'user_id', 'file_id'];

    protected $hidden = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('RDuuke\Newbie\Type');
    }

}