<?php
class homeController extends controller{
    
    public function index(){
        $dados = array();

        $a = new Anuncios();
        $u = new Usuarios();
        $c = new Categorias();

        $filtros = array(
            'categoria' => '',
            'preco' => '',
            'estado' => ''
        );
        if(isset($_GET['filtros'])){
            $filtros = $_GET['filtros'];
        }

        $total_anuncios = $a->getTotalAnuncios($filtros);
        $total_usuarios = $u->getTotalUsuarios();

        $pg = 1;
        if(isset($_GET['p']) && !empty($_GET['p'])){
            $pg = addslashes($_GET['p']);
        }
        $por_pagina = 2;
        $total_paginas = ceil($total_anuncios / $por_pagina);

        $anuncios = $a->getUltimosAnuncios($pg, $por_pagina, $filtros);
        $categoria = $c->getCategorias();

        $dados['total_anuncios'] = $total_anuncios;
        $dados['total_usuarios'] = $total_usuarios;
        $dados['categorias'] = $categoria;
        $dados['filtros'] = $filtros;
        $dados['anuncios'] = $anuncios;
        $dados['total_paginas'] = $total_paginas;

        $this->loadTemplate('home', $dados);
    }

}




?>