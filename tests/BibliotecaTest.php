<?php

namespace Deg540\RecuperacionKata\Test;

use Deg540\RecuperacionKata\Biblioteca;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

final class BibliotecaTest extends TestCase
{
    private Biblioteca $biblioteca;
    protected function setUp(): void{
        parent::setup();
        $this->biblioteca = new Biblioteca();
    } 
    /**
     * @test
     */
    public function prestarLibroSinLibrosPrestadosDevuelveUnLibro(){
        $prestamos = $this->biblioteca->prestamos("prestar libro");

        assertEquals("libro x1",$prestamos);
    }

    /**
     * @test
     */
    public function prestarUnLibroConOtrosLibrosPrestadosDevuelveVariosLibros(){
        $prestamos = $this->biblioteca->prestamos("prestar otroLibro");

        $prestamos = $this->biblioteca->prestamos("prestar unLibro");

        assertEquals("otroLibro x1, unLibro x1",$prestamos);
    }

    /**
     * @test
     */
    public function prestarUnLibroDevuelveLosLibrosOrdenadosAlfabeticamente(){
        $prestamos = $this->biblioteca->prestamos("prestar unLibro");

        $prestamos = $this->biblioteca->prestamos("prestar otroLibro");

        assertEquals("otroLibro x1, unLibro x1",$prestamos);
    }
}
