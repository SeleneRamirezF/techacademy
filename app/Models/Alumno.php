<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Seeders\AsignaturaSeeder;

class Alumno extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'apellidos', 'mail', 'foto'];

    //vamos ha poner la relacion n:m con asignaturas
    //funcion que nos da todas las asignaturas de un alumno
    public function asignaturas(){
        return $this->belongsToMany('App\Models\Asignatura')
            ->withPivot('nota')
            ->withTimestamps();
    }

    //funcion para traer las asignaturas que cursa un alumno
    public function asignaturasOut(){
        //guardamos las asignaturas que cursa el alumno que le pasamos
        $misAsignaturas = $this->asignaturas()->pluck('asignaturas.id');
        //guardamos las asignaturas que no tiene este alumno
        $asignaturasOut = Asignatura::whereNotIn('id', $misAsignaturas)->get();
        return $asignaturasOut;
    }

    //-----------------------------------------------------------------------------------------
    //implementando los scopes, hay que seguir la nomenclatura del NOMBRE
    public function scopeApellidos($query, $v){
        if(!isset($v)){
            return $query->where('apellidos', 'like', '%');
        }
        Switch($v){
            case "%":
                return $query->where('apellidos', 'like', '%');
            case "1" :
                return $query->where('apellidos', 'like', 'a%')
                ->orWhere('apellidos', 'like', 'b%')
                ->orWhere('apellidos', 'like', 'c%')
                ->orWhere('apellidos', 'like', 'd%')
                ->orWhere('apellidos', 'like', 'e%')
                ->orWhere('apellidos', 'like', 'f%');
            case "2" :
                return $query->where('apellidos', 'like', 'g%')
                ->orWhere('apellidos', 'like', 'h%')
                ->orWhere('apellidos', 'like', 'i%')
                ->orWhere('apellidos', 'like', 'j%')
                ->orWhere('apellidos', 'like', 'k%')
                ->orWhere('apellidos', 'like', 'l%');
            case "3" :
                return $query->where('apellidos', 'like', 'm%')
                ->orWhere('apellidos', 'like', 'n%')
                ->orWhere('apellidos', 'like', 'o%')
                ->orWhere('apellidos', 'like', 'p%')
                ->orWhere('apellidos', 'like', 'q%')
                ->orWhere('apellidos', 'like', 'r%');
            case "4" :
                return $query->where('apellidos', 'like', 's%')
                ->orWhere('apellidos', 'like', 't%')
                ->orWhere('apellidos', 'like', 'u%')
                ->orWhere('apellidos', 'like', 'v%')
                ->orWhere('apellidos', 'like', 'w%')
                ->orWhere('apellidos', 'like', 'x%')
                ->orWhere('apellidos', 'like', 'y%')
                ->orWhere('apellidos', 'like', 'z%');
        }
    }
}
