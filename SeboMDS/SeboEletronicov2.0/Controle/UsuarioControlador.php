<?php

require_once '../autoload.php';
class UsuarioControlador {
    
    
        public function salvaUsuario($nome, $email, $telefone, $senha){
            try{
                $usuario = new Usuario($nome, $telefone, $email, $senha);
            }catch(Exception $e){
                print"<script>alert('".$e->getMessage()."')</script>";
                echo "<script>window.location='http://localhost/SeboEletronicov2.0/Visao/cadastrarUsuario.php'; </script>";
                exit;    
            }
           $usuarioDao = new UsuarioDao();
           return $usuarioDao->salvaUsuario($usuario);
        }

        public function checaCadastroId($id){
            $usuarioDao = new UsuarioDao();
           return $usuarioDao->getCadastradosPorId($id);
        }

        public function alterarCadastro($nome, $email, $telefone, $senha, $id, $senhaVelha){
            try{
                
                $usuario = new Usuario($nome, $telefone, $email, $senha);
            }catch(Exception $e){
                print"<script>alert('".$e->getMessage()."')</script>";
                echo "<script>window.location='http://localhost/SeboEletronicov2.0/Visao/alteraUsuario.php'; </script>";
                exit;    
            }
           $usuarioDao = new UsuarioDao();
           return $usuarioDao->alteraUsuario($usuario,$id, $senhaVelha);
        
        }
        
        public function deletaCadastro($email, $senha){
   
            $usuarioDao = new UsuarioDao();
           return $usuarioDao->deletaUsuario($email, $senha);
   
        }

        public function pesquisaUsuario($nome){
            $usuarioDao = new UsuarioDao();
           return $usuarioDao->pesquisaUsuario($nome);
        } 
}

?>
