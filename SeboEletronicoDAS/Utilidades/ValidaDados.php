<?php

class ValidaDados {

        public static function validaCamposNulos($parametro){
            return !(empty($parametro));
            //retorna verdadeiro caso a variavel esteja vazia
            //com isso, o valor false eh invertido e enviado como true
        }
        
        public static function validaSenhaNula($senha){
            return (!(empty($senha[0])) && !(empty($senha[1])));
        }
        
        public static function validaNome($nome){

            $caracteresValidos = '. abcdefghijklmnopqrstuvwxyzçãõáíóúàòìùéèê';
            
            for ($i = 0; $i < strlen($nome); $i++) {
                $char = stripos($caracteresValidos, $nome[$i]);
                if(!$char){
                    return 1;
                }
                
                if($nome[$i] == " " && $nome[$i+1] == " "){
                    return 2;   
                }
            }
        }
        
        public static function validaEmail($email){
           if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                return 1;
           }
        }
        
        public static function validaTelefone($telefone){
            
            if(!filter_var($telefone, FILTER_VALIDATE_INT)){
                return 1;
            }elseif(strlen($telefone) != 8){
                return 2;
            }
        }
        
        public static function validaSenha($senha){

            if( !filter_var($senha[0], FILTER_VALIDATE_INT)){//caracter invalido
                return 1;
            }elseif(strlen($senha[0]) != 6 || strlen($senha[1]) != 6){//tamanho invalido
                return 2;
            }elseif($senha[0]!= $senha[1]){//senha e confirmação diferentes
                return 3;
            }
        }

}


?>
