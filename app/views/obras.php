<?php include 'layout-top.php' ?>

<!-- Contact Section Heading-->
<h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Obras</h2>
<!-- Icon Divider-->
<div class="divider-custom">
    <div class="divider-custom-line"></div>
    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
    <div class="divider-custom-line"></div>
</div>

<form method='POST' action='<?=route('obras/salvar/'._v($data,"id"))?>'>

<label class='col-md-6'>
    Titulo
    <input type="text" class="form-control" name="titulo" value="<?=_v($data,"titulo")?>" >
</label>

<label class='col-md-6'>
    Tipo
    <select name="tipo_id" class="form-control">
        <?php
        foreach($tipos as $tipo){
            _v($data,"tipo_id") == $tipo['id'] ? $selected='selected' : $selected='';
            print "<option value='{$tipo['id']}' $selected>{$tipo['tipo']}</option>";
        }
        ?>
    </select>
</label>

<label class='col-md-2'>
    Edicao
    <input type="text" class="form-control" name="edicao" value="<?=_v($data,"edicao")?>" >
</label>

<label class='col-md-2'>
    Valor
    <input type="text" class="form-control" name="valor" value="<?=_v($data,"valor")?>" >
</label>

<label class='col-md-6'>
    Autores
    <select name="autor_id" class="form-control">
        <option></option>
        <?php
        foreach($usuarios as $usu){
            print "<option value='{$usu['id']}'>{$usu['nome']}</option>";
        }
        ?>
    </select>  
</label>

<?php if (_v($data,'id')) : ?>
    <table class='table'>
        <tr>
            <th>Autor</th>
            <th>Deletar</th>
        </tr>
        <?php foreach($autores as $item): ?>
            <tr>
                <td><?=$item['nome']?></td>
                <td>
                    <a href='<?=route("obras/deletarAutor/{$item['id']}")?>'>Deletar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>    
<?php endif; ?>


<!-- <label class='col-md-6'>
    Tipo
    <select name="tipo" class="form-control">
        <?php
        /*foreach($tipos as $k=>$tipo){
            _v($data,"tipo") == 1 ? $selected='selected' : $selected='';
            print "<option value='$k' $selected>$tipo</option>";
        }*/
        ?>
    </select>
</label> -->

<button class='btn btn-primary col-12 col-md-3 mt-3'>Salvar</button>
<a class='btn btn-secondary col-12 col-md-3 mt-3' href="<?=route("obras")?>">Novo</a>

</form>

<table class='table'>

    <tr>
        <th>Editar</th>
        <th>Titulo</th>
        <th>Tipo</th>
        <th>Deletar</th>
    </tr>

    <?php foreach($lista as $item): ?>

        <tr>
            <td>
                <a href='<?=route("obras/index/{$item['id']}")?>'>Editar</a>
            </td>
            <td><?=$item['titulo']?></td>
            <td><?=$item['tipo']?></td>
            <td>
                <a href='<?=route("obras/deletar/{$item['id']}")?>'>Deletar</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<?php include 'layout-bottom.php' ?>