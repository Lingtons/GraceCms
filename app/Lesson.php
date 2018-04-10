<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Lesson extends Model
{
	
	use SoftDeletes;
	
    protected $dates = ['deleted_at'];
	
	protected $fillable = [
        'title',
		'body',
		'post_id',		
		
    ];
	
	public function post()
    {
        return $this->belongsTo('App\Post','post_id','id');
    }
}
