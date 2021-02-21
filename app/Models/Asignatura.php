<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'horas'];

    //vamos ha poner la relacion n:m con asignaturas
    public function alumnos(){
        return $this->belongsToMany('App\Models\Alumno')
            ->withPivot('nota')
            ->withTimestamps();
    }

    //devolvera los alumnos que no tienen la asignatura en cuestion
    public function alumnosOut(){
        $misalumnos = $this->alumnos()->pluck('alumnos.id');
        $alumnosSin = Alumno::whereNotIn('id', $misalumnos)->orderBy('apellidos');
        return $alumnosSin;
    }
}
