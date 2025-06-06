<?php

namespace Deg540\RecuperacionKata;

class Biblioteca
{ 
    private Array $prestamos = []; 
    public function prestamos(String $accion){
        $respuesta = $this->manejarLaAccion($accion);
        if($respuesta != null){
            return $respuesta;
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

    private function manejarLaAccion(String $accion){
        $accion = strtolower($accion);
        $datos = preg_split("/[ ]/",$accion);

        if($datos[0] == "limpiar"){
            $this->prestamos = [];
            return;
        }

        $cantidad = 1;
        if(2 < count($datos)){
            $cantidad = $datos[2];
        }

        if($datos[0] == "devolver"){
            if(!array_key_exists($datos[1],$this->prestamos)){
                return "El libro indicado no está en préstamo";
            }
            $this->prestamos[$datos[1]] -= 1;
            if($this->prestamos[$datos[1]] == 0){
                unset($this->prestamos[$datos[1]]);
                return "El libro indicado no está en préstamo";
            }
            return;
        }

        if(!array_key_exists($datos[1],$this->prestamos)){
            $this->prestamos[$datos[1]] = $cantidad;
            return;
        } 
        $this->prestamos[$datos[1]] += $cantidad;
    }
}