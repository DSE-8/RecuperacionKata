<?php

namespace Deg540\RecuperacionKata\Test;

use Deg540\RecuperacionKata\Biblioteca;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

final class BibliotecaTest extends TestCase
{
    /**
     * @test
     */
    public function prestarLibroSinLibrosPrestadosDevuelveUnLibro(){
        $biblioteca = new Biblioteca();
        
        $prestamos = $biblioteca->prestamos("prestar libro");

        assertEquals("libro x1",$prestamos);
    }

    /**
     * @test
     */
    public function prestarUnLibroConOtrosLibrosPrestadosDevuelveVariosLibros(){
        $biblioteca = new Biblioteca();
        $prestamos = $biblioteca->prestamos("prestar otroLibro");

        $prestamos = $biblioteca->prestamos("prestar unLibro");

        assertEquals("otroLibro x1, unLibro x1",$prestamos);
    }
}
