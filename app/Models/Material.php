<?php

namespace Escola\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
	protected $fillable = ['path_name','id_licao'];

	/*Um material pertence a uma lição*/
	public function licao(){
		return $this->belongsTo(Licao::class);
	}
}
