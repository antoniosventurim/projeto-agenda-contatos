<?php
    include_once("templates/header.php");
?>
    <div class="container">
    <?php include_once("templates/backbtn.html"); ?>
    <h1 id="main-title">Adicionar contato</h1>
    <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
    <input type="hidden" name="type" value="create">
    <div class="form-group">
        <label for="name">Nome do contato:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" required>
    </div>
    <div class="form-group">
        <label for="phone">Telefone de contato:</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o telefone" required>
    </div>
    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail" required>
    </div>
    <div class="form-group">
        <label for="name">Observação:</label><br>
        <textarea class="form-control" name="description" id="description" placeholder="Faça uma pequena descrição" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary mb-4">Cadastrar</button>
    </form>
    </div>
<?php
include_once("templates/footer.php");
?>