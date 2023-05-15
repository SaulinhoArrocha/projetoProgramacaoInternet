<?php include 'layout-top.php' ?>



<form method='POST' action='<?=route('obras/salvar/'._v($data,"id"))?>'>

<label class='col-md-6'>
    Titulo
    <input type="text" class="form-control" name="titulo" value="<?=_v($data,"titulo")?>" >
</label>

<label class='col-md-2'>
    Tipo
    <input type="text" class="form-control" name="tipo" value="<?=_v($data,"tipo")?>" >
</label>

<label class='col-md-2'>
    Edicao
    <input type="text" class="form-control" name="edicao" value="<?=_v($data,"edicao")?>" >
</label>

<label class='col-md-2'>
    Valor
    <input type="text" class="form-control" name="valor" value="<?=_v($data,"valor")?>" >
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