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
    public function prestarUnLibroEnMayusculasDevuelveUnLibroEnMinusculas(){
        $prestamos = $this->biblioteca->prestamos("prestar unLibro");

        assertEquals("unlibro x1",$prestamos);
    }

    /**
     * @test
     */
    public function prestarUnLibroYaPrestadoDevuelveUnLibroConSuNumeroDePrestamos(){
        $prestamos = $this->biblioteca->prestamos("prestar unLibro");

        $prestamos = $this->biblioteca->prestamos("prestar unLibro");

        assertEquals("unlibro x2",$prestamos);
    }

    /**
     * @test
     */
    public function prestarUnLibroDevuelveLosLibrosOrdenadosAlfabeticamente(){
        $prestamos = $this->biblioteca->prestamos("prestar unlibro");

        $prestamos = $this->biblioteca->prestamos("prestar otrolibro");

        assertEquals("otrolibro x1, unlibro x1",$prestamos);
    }
}
