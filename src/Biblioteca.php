<?php

namespace Deg540\RecuperacionKata;

class Biblioteca
{ 
    private Array $prestamos = []; 
    public function prestamos(String $accion){
        $accion = strtolower($accion);
        $datos = preg_split("/[ ]/",$accion);
        if(2 < count($datos)){
            if(array_key_exists($datos[1],$this->prestamos))
                $this->prestamos[$datos[1]] += $datos[2];
            else{
                $this->prestamos[$datos[1]] = $datos[2];
            }
        }
        else if(array_key_exists($datos[1],$this->prestamos))
            $this->prestamos[$datos[1]] += 1;
        else{
            $this->prestamos[$datos[1]] = 1;
        }
        $respuesta = "";
        $librosPrestados = array_keys($this->prestamos);
        sort($librosPrestados);
        foreach($librosPrestados as $prestamo){
            if($respuesta != ""){
                $respuesta .= ", ";
            }
            $respuesta .= $prestamo . " x".$this->prestamos[$prestamo];
        }
        return $respuesta;
    } 
}