<?php
class loginController extends controller{
    public function entrar(){
        $dados = array();
        $u = new Usuarios();

        if(isset($_POST['email']) && !empty($_POST['email'])){
            $dados['email'] = addslashes($_POST['email']);
            $dados['senha'] = $_POST['senha'];
            

            if($u->login($dados['email'], $dados['senha'])){ 
                $nome = $u->pegarNome($_SESSION['cLogin']);
                ?>  
                    
                    <script type="text/javascript">window.location.href="<?php echo BASE_URL; ?>";</script>

                <?php
            }else{
                ?>
                    <div class="alert alert-danger">
                        Úsuario e/ou Senha errados!
                    </div>
                <?php
            }           
        }
        

        $this->loadTemplate('login', $dados);   
    }

    public function cadastrar(){
        $dados = array();
        $this->loadTemplate('cadastrar', $dados);
        $u = new Usuarios();
        if(isset($_POST['nome']) && !empty($_POST['nome'])){
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = $_POST['senha'];
            $telefone = addslashes($_POST['telefone']);

            if(!empty($nome) && !empty($email) && !empty($senha)){
                if($u->cadastrar($nome, $email, $senha, $telefone)){
                    ?>
                    <div class="alert alert-success">
                        <strong>Parabéns!</strong> Cadastrado com sucesso. <a href="<?php echo BASE_URL; ?>login/entrar" class="alert-link">Faça login agora</a>
                    </div>
                    <?php
                }else{
                    ?>
                    <div class="alert alert-warning">
                        usuario já existe! <a href="<?php echo BASE_URL; ?>login/entrar" class="alert-link">Faça login agora</a>
                    </div>
                <?php                    
                }
            }else{
                ?>
                    <div class="alert alert-danger">
                        Preencha todos os campos!
                    </div>
                <?php
            }
        }
    }

    public function sair(){
        session_start();
        unset($_SESSION['cLogin']);
        header("Location: ".BASE_URL);
    }

    public function index(){
        

    }
  
}