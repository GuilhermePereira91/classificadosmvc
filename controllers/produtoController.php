<?php
class produtoController extends controller{
    public function index(){

    }
    public function abrir($id){
        $dados = array();
        $a = new Anuncios();
        $u = new Usuarios();

        if(empty($id)){
            header ("Location: ".BASE_URL);
        }

        $info = $a->getAnuncio($id);

        $dados['info'] = $info;

        $this->loadTemplate('produto', $dados);
    }

    public function adicionar(){
        $dados = array();
        $c = new Categorias();
        $a = new Anuncios();
        $cats = $c->getCategorias();
        $dados['cats'] = $cats;
        $this->loadTemplate('adicionar', $dados);
        if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
            $titulo = addslashes($_POST['titulo']);
            $categorias = addslashes($_POST['categoria']);
            $valor = addslashes($_POST['valor']);
            $descricao = addslashes($_POST['descricao']);
            $estado = addslashes($_POST['estado']);
            $a->addAnuncio($titulo,$categorias,$valor,$descricao,$estado);
            header ("Location: ".BASE_URL."anuncios");
            ?>
            <div class="alert alert-success" role="alert">
                Produto cadastrado com sucesso!
            </div>
            <?php   
        }
    }

    public function editar($id){
        $dados = array();
        $a = new Anuncios();
        $c = new Categorias();
        if(empty($id)){
            header ("Location: ".BASE_URL."anuncios");
        }
        if(empty($_SESSION['cLogin'])){
            ?>  
                <script type="text/javascript">window.location.href="<?php echo BASE_URL; ?>";</script>
            <?php
            exit;
        }
        $info = $a->getAnuncio($id);
        $cats = $c->getCategorias();
        $dados['info'] = $info;
        $dados['cats'] = $cats;

        $this->loadTemplate('editar', $dados);

        if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
            $titulo = addslashes($_POST['titulo']);
            $categorias = addslashes($_POST['categoria']);
            $valor = addslashes($_POST['valor']);
            $descricao = addslashes($_POST['descricao']);
            $estado = addslashes($_POST['estado']);
            if(isset($_FILES['fotos'])){
                $fotos = $_FILES['fotos'];
            }else{
                $fotos = array();
            }
            $a->editaAnuncio($id,$titulo,$categorias,$valor,$descricao,$estado, $fotos);
            ?>  
                <script type="text/javascript">window.location.href="<?php echo BASE_URL.'produto/editar/'.$id ?>";</script>
            <?php
        }

    }

    public function excluir($id){
        $a = new Anuncios();

        if(empty($id)){
            header ("Location: ".BASE_URL);
        }
        $a->excluirAnuncio($id);
        if(isset($id) && !empty($id)){
            $a->excluirAnuncio($id);
            header ("Location: ".BASE_URL."anuncios");
        }else{
            header ("Location: ".BASE_URL."anuncios");
        }
        
    }

    public function excluirFoto($id){
        if(empty($_SESSION['cLogin'])){
            header("Location: ".BASE_URL."login/entrar");
            exit;
        }
        $a = new Anuncios();
        
        if(isset($id) && !empty($id)){
            $id_anuncio = $a->excluirFoto($id);
        }
    
        if(isset($id_anuncio)){
            header("Location: ".BASE_URL."produto/editar/".$id_anuncio);
        }else{
            header("Location: ".BASE_URL."anuncios");
        }
    }
}

?>