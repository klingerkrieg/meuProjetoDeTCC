<?php include 'layout-top.php' ?>

<!-- Contact Section Heading-->
<h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Veículos</h2>
<!-- Icon Divider-->
<div class="divider-custom">
    <div class="divider-custom-line"></div>
    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
    <div class="divider-custom-line"></div>
</div>

<form method='POST' action='<?=route('veiculos/salvar/'._v($data,"id"))?>'>

<label class='col-md-6'>
    Placa
    <input type="text" class="form-control" name="placa" value="<?=_v($data,"placa")?>" >
</label>

<label class='col-md-6'>
    Modelo
    <select name="modelo_id" class="form-control">
        <?php
        foreach($modelos as $modelo){
            _v($data,"modelo_id") == $modelo['id'] ? $selected='selected' : $selected='';
            print "<option value='{$modelo['id']}' $selected>{$modelo['modelo']}</option>";
        }
        ?>
    </select>
</label>


<label class='col-md-2'>
    Cor
    <input type="text" class="form-control" name="cor" value="<?=_v($data,"cor")?>" >
</label>

<label class='col-md-2'>
    Ano
    <input type="text" class="form-control" name="ano" value="<?=_v($data,"ano")?>" >
</label>


<label class='col-md-6'>
    Motoristas
    <select name="motorista_id" class="form-control">
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
            <th>Nome</th>
            <th>Deletar</th>
        </tr>
        <?php foreach($motoristas as $item): ?>
            <tr>
                <td><?=$item['nome']?></td>
                <td>
                    <a href='<?=route("veiculos/deletarMotorista/{$item['id']}")?>'>Deletar</a>
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
<a class='btn btn-secondary col-12 col-md-3 mt-3' href="<?=route("veiculos")?>">Novo</a>

</form>

<table class='table'>

    <tr>
        <th>Editar</th>
        <th>Placa</th>
        <th>Modelo</th>
        <th>Deletar</th>
    </tr>

    <?php foreach($lista as $item): ?>

        <tr>
            <td>
                <a href='<?=route("veiculos/index/{$item['id']}")?>'>Editar</a>
            </td>
            <td><?=$item['placa']?></td>
            <td><?=$item['modelo']?></td>
            <td>
                <a href='<?=route("veiculos/deletar/{$item['id']}")?>'>Deletar</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<?php include 'layout-bottom.php' ?>