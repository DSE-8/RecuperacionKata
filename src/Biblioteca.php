<?php

namespace Deg540\RecuperacionKata;

class Biblioteca
{ 
    private Array $prestamos = []; 
    public function prestamos(String $accion){
        $accion = strtolower($accion);
        $datos = preg_split("/[ ]/",$accion);
        $this->prestamos[] = $datos[1];
        $respuesta = "";
        sort($this->prestamos);
        foreach($this->prestamos as $prestamo){
            if($respuesta != ""){
                $respuesta .= ", ";
            }
            $respuesta .= $prestamo . " x1";
        }
        return $respuesta;
    } 
}