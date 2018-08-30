<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
	
	protected $table = 'tareas';
	protected $fillable = ['descripcion', 'id_autor'];

	public function autor()
	{
		return $this->belongsTo(Autor::class, 'id_autor');
	}

	public function etiquetas()
	{
		return $this->belongsToMany(Etiqueta::class, 'tareas_etiquetas', 'id_tarea', 'id_etiqueta');
	}


}
