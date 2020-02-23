<?php
    class Usuarios extends model{
        public function getTotalUsuarios(){
            
            $sql = $this->db->query("SELECT COUNT(*) as u FROM usuarios");
            $row = $sql->fetch();
            return $row['u'];
        }
        public function cadastrar($nome, $email, $senha, $telefone){
            
            $sql = $this->db->prepare("SELECT id FROM usuarios WHERE email = :email");
            $sql->bindValue(":email", $email);
            $sql->execute();

            if($sql->rowCount() == 0){
                $sql = $this->db->prepare("INSERT INTO usuarios (nome, email, senha, telefone) VALUES (:nome, :email, :senha, :telefone)");
                $sql->bindValue(":nome", $nome);
                $sql->bindValue(":email", $email);
                $sql->bindValue(":senha", md5($senha));
                $sql->bindValue(":telefone", $telefone);                
                $sql->execute();
                return true;

            }else{
                return false;
            }
        }

        public function login($email, $senha){
            
            $sql = $this->db->prepare("SELECT id FROM usuarios WHERE email = :email AND senha = :senha");
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", md5($senha));
            $sql->execute();

            if($sql->rowCount() > 0){
                $dado = $sql->fetch();
                $_SESSION['cLogin'] = $dado['id'];
                return true;
            }else{
                return false;
            }

        }
        public function pegarNome($id){
            
            $sql = $this->db->prepare("SELECT nome FROM usuarios WHERE id = :id");
            $sql->bindValue(":id", $_SESSION['cLogin']);
            $sql->execute();

            if($sql->rowCount() > 0){
                $dado = $sql->fetch();
                
                return $dado['nome'];
            }else{
                return false;
            }
        }
    }    
?>