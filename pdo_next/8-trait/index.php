<?php
/**
 * todo Les traits ont été inventés pour repousser les limites de l'héritage
 * todo En effet une class peut hériter que d'une seule class (extends)
 * todo En revanche, une class peut importer plusieurs traits
 * todo Un trait n'est pas une class
 * 
 **/
trait Test
{
    public $proprieteTest = 'Test';
    public function functionTest()
    {
        return 'function test';
    }
}

trait Kiwi
{
    public $proprieteKiwi = 'Kiwi';
    public function functionKiwi()
    {
        return 'function Kiwi';
    }
}

class Testing
{
    use Test, Kiwi;
}

$testing = new Testing();
echo $testing->proprieteTest;
echo $testing->functionTest();