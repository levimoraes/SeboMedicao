<?php

require_once "../autoload.php";

class UsuarioDaoTest extends PHPUnit_Framework_TestCase {

    protected $usuarioDaoTest;
    protected $usuario;
    
    protected function setUp() {
        $senha = array(123123,123123);
        $this->usuario = new Usuario('lucas', 98989898, 'lucas@lucas.com', $senha);
        $this->usuarioDaoTest = new UsuarioDao();
    }

    protected function tearDown() {
        unset($this->usuarioDaoTest);
        unset($this->usuario);
    }

    public function testSalvaUsuario() {
        $retorno = $this->usuarioDaoTest->salvaUsuario($this->usuario);
        $this->assertTrue($retorno);
    }
    
    public function testAlteraUsuario(){
        $retorno = $this->usuarioDaoTest->alteraUsuario($this->usuario, 11, 123456);
        $this->assertTrue($retorno);
    }
    
    public function testPesquisaUsuario(){
        $retorno = $this->usuarioDaoTest->pesquisaUsuario(null);
        $this->assertNotFalse($retorno);
    }
    
    public function testDeletaUsuario(){
        $senha = $this->usuario->getSenha();
        $retorno = $this->usuarioDaoTest->deletaUsuario($this->usuario->getEmail(), $senha[0]);
        $this->assertTrue($retorno);
    }
    
//    public function testGetCadastradosPorIdComIdNulo(){
//        $retorno = $this->usuarioDaoTest->getCadastradosPorId(null);
//        $this->assertFalse($retorno);
//    }
    
//    public function testGetCadastradosPorIdComIdInvalido(){
//        $retorno = $this->usuarioDaoTest->getCadastradosPorId(-2);
//        $this->assertFalse($retorno);
//    }
    
//    public function testGetCadastradosPorIdComIdValido(){
//        $senha = $this->usuario->getSenha();
//        $retorno = $this->usuarioDaoTest->getCadastradosPorId(23);
//        $this->assertEquals($this->usuario->getEmail(), $retorno[4]);
//        $this->assertEquals($this->usuario->getNome(), $retorno[1]);
//        $this->assertEquals($this->usuario->getTelefone(), $retorno[3]);
//
//    }
}
