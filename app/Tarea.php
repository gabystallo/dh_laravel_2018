<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
	
	protected $table = 'tareas';


	public function nombreCompleto()
	{
		return $this->descripcion . ' (' . $this->autor . ')';
	}

}
