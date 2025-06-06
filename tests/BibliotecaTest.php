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
    public function prestarDosCopiasDeUnLibroDevuelveUnLibroConSuNumeroDePrestamos(){
        $prestamos = $this->biblioteca->prestamos("prestar unLibro");

        $prestamos = $this->biblioteca->prestamos("prestar unLibro 2");

        assertEquals("unlibro x3",$prestamos);
    }

    /**
     * @test
     */
    public function prestarUnLibroDevuelveLosLibrosOrdenadosAlfabeticamente(){
        $prestamos = $this->biblioteca->prestamos("prestar unlibro");

        $prestamos = $this->biblioteca->prestamos("prestar otrolibro");

        assertEquals("otrolibro x1, unlibro x1",$prestamos);
    }

    /**
     * @test
     */
    public function limpiarEliminaTodosLosPrestamos(){
        $prestamos = $this->biblioteca->prestamos("prestar unLibro");

        $prestamos = $this->biblioteca->prestamos("limpiar");

        assertEquals("",$prestamos);
    }

    /**
     * @test
     */
    public function devolverUnLibroReduceEsePrestamoYDevuelveLosLibrosOrdenadosAlfabeticamente(){
        $prestamos = $this->biblioteca->prestamos("prestar unlibro 2");

        $prestamos = $this->biblioteca->prestamos("devolver unlibro");

        assertEquals("unlibro x1",$prestamos);
    }

    /**
     * @test
     */
    public function devolverUnLibroPrestadoUnaVezEliminaEseLibro(){
        $prestamos = $this->biblioteca->prestamos("prestar unlibro 1");

        $prestamos = $this->biblioteca->prestamos("devolver unlibro");

        assertEquals("",$prestamos);
    }

    /**
     * @test
     */
    public function devolverUnLibroNuncaAntesPrestadoDevuelveUnErrorIndicandoQueNoEstaPrestado(){
        $prestamos = $this->biblioteca->prestamos("devolver unlibro");

        assertEquals("El libro indicado no está en préstamo",$prestamos);
    }
}
