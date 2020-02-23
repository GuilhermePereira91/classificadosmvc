<div class="container">
    <h1>Meus Anúncios - Editar Anúncios</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria" class="form-control">
                <?php
                   
                   foreach($cats as $cat):
                ?>
                <option value="<?php echo $cat['id'] ?>" <?php echo ($info['id_categoria']==$cat['id'])?'selected="selected"':'' ?>><?php echo $cat['nome']; ?></option>
                <?php
                    endforeach;
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" value="<?php echo $info['titulo'] ?>" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="text" name="valor" id="valor" value="<?php echo $info['valor'] ?>" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="descricao">Titulo:</label>
            <textarea class="form-control" name="descricao"><?php echo $info['descricao'] ?></textarea>
        </div>
        <div class="form-group">
        <label for="estado">Estado:</label>
            <select name="estado" id="estado" class="form-control">
                <option value="0" <?php echo ($info['estado']==0)?'selected="selected"':'' ?>>Ótimo</option>
                <option value="1" <?php echo ($info['estado']==1)?'selected="selected"':'' ?>>Bom</option>
                <option value="2" <?php echo ($info['estado']==2)?'selected="selected"':'' ?>>Ruim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="foto">Escolher fotos:</label><br/>
            <input type="file" name="fotos[]" multiple/>
            <br/><br/>
            <div class="card" style="width: fluid;">
            <div class="card-header">
                <h5 class="card-title">Fotos do produto:</h5>
            </div>
            <div class="card-body">
                    <?php foreach($info['fotos'] as $foto): ?>
                       <div class="foto_item">
                            <img src="<?php echo BASE_URL; ?>assets/images/anuncios/<?php echo $foto['url'];?>" border=0 class="img-thumbnail"/>
                            <a href="<?php echo BASE_URL; ?>produto/excluirFoto/<?php echo $foto['id']; ?>" class="btn btn-danger">Excluir Imagem</a>                            
                       </div>
                    <?php endforeach; ?>
            </div>
            </div>
        </div>
        <input class="btn btn-outline-secondary" type="submit" value="Salvar"/>
    </form>
</div>