<?php

require_once '../autoload.php';
    
class LivroControlador {
    
    public function salvaLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $id_dono){
       if(empty($venda) && empty($troca)){
            $venda = "venda";
            $troca = "troca";
        }

        try{
            $livro = new Livro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao);
        }catch(Exception $e){
            print"<script>alert('".$e->getMessage()."')</script>";
            echo "<script>window.location='http://localhost/SeboEletronicov2.0/Visao/cadastrarLivro.php';</script>";
            exit;    
        }
        
        $livroDao = new LivroDao();
        
        return $livroDao->salvaLivro($livro, $id_dono);
    }
    
    public function pesquisaLivro($titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca){
       $livroDao = new LivroDao;
        return $livroDao->pesquisaLivro($titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca);
    }
    
    public function getLivroById($id){
        $livroDao = new LivroDao;
        return $livroDao->getLivroById($id);
    }
    
    public function deletaLivro($idLivro){
        $livroDao = new LivroDao;
        return $livroDao->deletaLivro($idLivro);
        }
    
    public function alteraLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $id_dono, $id_usuario){
        if(empty($venda) && empty($troca)){
            $venda = "venda";
            $troca = "troca";
        }

        try{
            $livro = new Livro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao);
        }catch(Exception $e){
            print"<script>alert('".$e->getMessage()."')</script>";
            echo "<script>window.location='http://localhost/SeboEletronicov2.0/Visao/cadastrarLivro.php';</script>";
            exit;    
        }
        $livroDao = new LivroDao;
        return $livroDao->alteraLivro($livro, $id_dono, $id_usuario);
    }
    
    public function getLivroByIdUsuario($idUsuario){
        $livroDao = new LivroDao;
        return $livroDao->getLivroByIdUsuario($idUsuario);
    }
    
    public function getAllLivro(){
        $livroDao = new LivroDao;
        return $livroDao->getAllLivro();
    }
    
}

?>
