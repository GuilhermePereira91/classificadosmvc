<html>
    <head>
        <title>Meu site</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/style.css" />
        
    </head>
    <body>
    <nav class="navbar navbar bg-dark" style="margin-bottom: 10px;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="<?php echo BASE_URL; ?>" class="navbar-brand">Classificados</a>
                </div>
                <ul class="nav navbar-item navbar-right">
                <?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
                <li><span class="badge badge-dark"><?php echo "USUARIO: EMBREVE"/*.$nome*/ ?></span></li>
                <li class="mx-2"><a href="<?php echo BASE_URL; ?>anuncios">Meus Anúncios</a></li>
                <li class="mx-2"><a href="<?php echo BASE_URL; ?>login/sair">Sair</a></li>
                <?php else: ?>
                <li class="mx-2"><a href="<?php echo BASE_URL; ?>login/cadastrar">Cadastre-se</a></li>
                <li class="mx-2"><a href="<?php echo BASE_URL; ?>login/entrar">Login</a></li>
                <?php endif; ?>

                </ul>
            </div>
        </nav>  
        
        
        
        <?php $this->loadViewInTemplate($viewname, $viewData); ?>



        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/jquery.min.js" ></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/bootstrap.min.js" ></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/script.js" ></script>
    </body>
</html>