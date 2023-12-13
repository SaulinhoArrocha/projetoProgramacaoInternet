<?php include 'layout-top.php' ?>

<!-- Contact Section Heading-->
<h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Anexar Obras</h2>
<!-- Icon Divider-->
<div class="divider-custom">
    <div class="divider-custom-line"></div>
    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
    <div class="divider-custom-line"></div>
</div>

<form method='POST' action='<?=route('obrasUsuarios/salvar/'._v($data,"id"))?>'>

<label class='col-md-6'>
    Titulo
    <input type="text" class="form-control" name="titulo" value="<?=_v($data,"titulo")?>" >
</label>

<label class='col-md-2'>
    Tipo
    <input type="text" class="form-control" name="tipo" value="<?=_v($data,"tipo")?>" >
</label>

<label class='col-md-2'>
    Descricao
    <input type="text" class="form-control" name="descricao" value="<?=_v($data,"descricao")?>" >
</label>

<label class='col-md-2'>
    Valor desejado
    <input type="text" class="form-control" name="valorDesejado" value="<?=_v($data,"valorDesejado")?>" >
</label>

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
<a class='btn btn-secondary col-12 col-md-3 mt-3' href="<?=route("obrasUsuarios")?>">Novo</a>

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
                <a href='<?=route("obrasUsuarios/index/{$item['id']}")?>'>Editar</a>
            </td>
            <td><?=$item['titulo']?></td>
            <td><?=$item['tipo']?></td>
            <td>
                <a href='<?=route("obrasUsuarios/deletar/{$item['id']}")?>'>Deletar</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<?php include 'layout-bottom.php' ?>