<?php

namespace Deg540\RecuperacionKata;

class Biblioteca
{ 
    private Array $prestamos = []; 
    public function prestamos(String $accion){
        $datos = preg_split("/[ ]/",$accion);
        $this->prestamos[] = $datos[1];
        $respuesta = "";
        foreach($this->prestamos as $prestamo){
            if($respuesta != ""){
                $respuesta .= ", ";
            }
            $respuesta .= $prestamo . " x1";
        }
        return $respuesta;
    } 
}