<?php

namespace Deg540\RecuperacionKata\Test;

use Deg540\RecuperacionKata\Kata;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

final class KataTest extends TestCase
{
    /**
     * @test
     */
    public function givenNothingReturnsEmptyString(){
        $listaDeLaCompra = new Kata();

        $convertedValue = $listaDeLaCompra->getList('');

        assertEquals('',$convertedValue);
    }
    /**
     * @test
     */
    public function addingPanReturnsPanes(){
        $listaDeLaCompra = new Kata();
        $convertedValue = $listaDeLaCompra->getList("añadir Pan");

        $convertedValue = $listaDeLaCompra->getList("añadir Pan 3");

        assertEquals("pan x4",$convertedValue);
    }
    /**
     * @test
     */
    public function deletingPanReturnsListWithoutPan(){
        $listaDeLaCompra = new Kata();
        $convertedValue = $listaDeLaCompra->getList("añadir Pan 2");

        $convertedValue = $listaDeLaCompra->getList("eliminar Pan");

        assertEquals("",$convertedValue);
    }
    /**
     * @test
     */
    public function deletingPanFromEmptyListReturnsNotExistingErrorString(){
        $listaDeLaCompra = new Kata();

        $convertedValue = $listaDeLaCompra->getList("eliminar Pan");

        assertEquals("El producto seleccionado no existe",$convertedValue);
    }
    /**
     * @test
     */
    public function givenStringVaciarReturnsEmptyString(){
        $listaDeLaCompra = new Kata();
        $convertedValue = $listaDeLaCompra->getList("añadir Pan");

        $convertedValue = $listaDeLaCompra->getList("vaciar");

        assertEquals("",$convertedValue);
    }
}
