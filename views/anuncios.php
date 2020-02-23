<div class="container">
    <h1>Meus Anúncios</h1>
    <a href="<?php echo BASE_URL;?>produto/adicionar" class="btn btn-secondary">Adicionar Anúncio</a><br/><br/>
<table class="table">
    <thead>
        <th>Foto</th>
        <th>Titulo</th>
        <th>Decrição</th>
        <th>Valor</th>
        <th>Ações</th>
    </thead>
        <?php foreach($anuncios as $anuncio): ?>
        <tr>
            <td>
                <?php
                if(!empty($anuncio['url'])): ?>
                <img src="assets/images/anuncios/<?php echo $anuncio['url']; ?>" height="100" width="150" border=0 />
                <?php else: ?>
                <img src="assets/images/default-foto.png" height="100" width="150" border=0 />
                <?php endif; ?>
            </td>
            <td><?php echo utf8_encode($anuncio['titulo']); ?></td>
            <td><?php echo utf8_encode($anuncio['descricao']); ?></td>
            <td><?php echo "R$".number_format($anuncio['valor'], 2); ?></td>
            <td>
                <a href="<?php echo BASE_URL;?>produto/editar/<?php echo $anuncio['id']; ?>" class="btn btn-outline-secondary">Editar</a>
                <a href="<?php echo BASE_URL;?>produto/excluir/<?php echo $anuncio['id']; ?>" class="btn btn-danger">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
</table>
</div>