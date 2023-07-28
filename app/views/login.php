<?php include 'layout-top.php' ?>

<!-- Contact Section Heading-->
<h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Login</h2>
<!-- Icon Divider-->
<div class="divider-custom">
    <div class="divider-custom-line"></div>
    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
    <div class="divider-custom-line"></div>
</div>

<?php if (isset($msg) && $msg != "") : ?>
    <div class="alert alert-danger" role="alert">
    <?=$msg?>
    </div>
<?php endif; ?>

<form class="d-flex flex-column align-items-center" method='POST' action='<?=route('autenticacao/logar/')?>'>

<label class='col-md-5'>
    E-mail
    <input type="text" class="form-control" name="email" value="" >
</label>

<label class='col-md-5'>
    Senha
    <input type="password" class="form-control" name="senha" value="" >
</label>

<button class='btn btn-primary col-12 col-md-3 mt-3'>Entrar</button>
</form>

<?php include 'layout-bottom.php' ?>