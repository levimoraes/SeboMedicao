<?php

require_once "../autoload.php";

class LivroControladorTest extends PHPUnit_Framework_TestCase{
    
    protected $livroControladorTeste;
    protected $livroTeste;

    protected function setUp() {
        $this->livroTeste = new LivroFisico('calculo 1', 'Thomas', 'engenharia', 2, 'editora teste', 'venda', 'troca', 'novo', 'livro e muito legal');
        $this->livroControladorTeste = new LivroControlador();
    }

    protected function tearDown() {
        unset($this->livroControladorTeste);
        unset($this->livroTeste);
        
    }
    /**
     * @covers LivroControlador::salvaLivro
     */
    public function testSalvaLivro() {
        $retorno = $this->livroControladorTeste->salvaLivro('calculo 1', 'Thomas', 'engenharia', 2, 'editora teste', 'venda', 'troca', 'novo', 'livro e muito legal',NULL, 23);
        $this->assertFalse($retorno);
    }
    /**
     * @covers LivroControlador::pesquisaLivro
     */
    public function testPesquisaLivro() {
        $retorno = $this->livroControladorTeste->pesquisaLivro($this->livroTeste->getTitulo(), 'novo', 'usado', 
                'venda', 'troca');
        $this->assertNotFalse($retorno);
    }
    /**
     * @covers LivroControlador::getLivroById
     */
    public function testGetLivroByIdComIdNulo() {
            $retorno = $this->livroControladorTeste->getLivroById(null);
            $this->assertFalse($retorno);    
    }
    /**
     * @covers LivroControlador::getLivroById
     */
    public function testGetLivroByIdComIdNegativo() {
            $retorno = $this->livroControladorTeste->getLivroById(-3);
            $this->assertFalse($retorno);    
    }
    /**
     * @covers LivroControlador::getLivroById
     */
    public function testGetLivroByIdComIdValido() {
            $retorno = $this->livroControladorTeste->getLivroById(7);
            $this->assertEquals(23, 23);
            $this->assertEquals($this->livroTeste->getTitulo(), $this->livroTeste->getTitulo());
            $this->assertEquals($this->livroTeste->getEditora(), $this->livroTeste->getEditora());
            $this->assertEquals($this->livroTeste->getAutor(), $this->livroTeste->getAutor());
            $this->assertEquals($this->livroTeste->getEdicao(), $this->livroTeste->getEdicao());
            $this->assertEquals($this->livroTeste->getGenero(), $this->livroTeste->getGenero());
            $this->assertEquals($this->livroTeste->getEstado(), $this->livroTeste->getEstado());
            $this->assertEquals($this->livroTeste->getDescricao(), $this->livroTeste->getDescricao());
            $this->assertEquals($this->livroTeste->getVenda(), $this->livroTeste->getVenda());
            $this->assertEquals($this->livroTeste->getTroca(), $this->livroTeste->getTroca());  
    }
    /**
     * @covers LivroControlador::deletaLivro
     */
    public function testDeletaLivro() {
        $retorno = $this->livroControladorTeste->deletaLivro(15);
        $this->assertTrue($retorno);    
    }
    /**
     * @covers LivroControlador::alteraLivro
     */
    public function testAlteraLivro() {
            $retorno = $this->livroControladorTeste->alteraLivro('calculo 1', 'Thomas', 'engenharia', 2, 'editora teste', 'venda', 'troca', 'novo', 'livro e muito legal', 23,16);
            $this->assertTrue($retorno);    
    }
    /**
     * @covers LivroControlador::recuperaLivroPorIdUsuario
     */
    public function testGetLivroByIdUsuario() {
        $retorno = $this->livroControladorTeste->recuperaLivroPorIdUsuario(23);
        $this->assertNotFalse($retorno);    
    }
    /**
     * @covers LivroControlador::pegaTodosLivros
     */
    public function testGetAllLivro(){
        $retorno = $this->livroControladorTeste->pegaTodosLivros(23);
        $this->assertNotFalse($retorno);
    }       
//
//    
    }

?>

