<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = 'autores';

    public function tareas()
    {
    	return $this->hasMany(Tarea::class, 'id_autor');
    }
}
