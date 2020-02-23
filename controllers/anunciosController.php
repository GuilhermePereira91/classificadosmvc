<?php
class anunciosController extends controller{
        public function index(){
                $dados = array();
                $a = new Anuncios();
                $anuncios = $a->getMeusAnuncios();
                $dados['anuncios'] = $anuncios;
                $this->loadTemplate('anuncios', $dados);
        }
}


?>