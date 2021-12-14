<?php
    include_once("templates/header.php");
?>
    <div class="container">
    <?php include_once("templates/backbtn.html"); ?>
    <h1 id="main-title">Editar Contato</h1>
    <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
    <input type="hidden" name="type" value="edit">
    <input type="hidden" name="id" value="<?= $contact['id'] ?>">
    <div class="form-group">
        <label for="name">Nome do contato:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" value="<?= $contact['name'] ?>" required>
    </div>
    <div class="form-group">
        <label for="phone">Telefone de contato:</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o telefone" value="<?= $contact['phone'] ?>" required>
    </div>
    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail" value="<?= $contact['email'] ?>" required>
    </div>
    <div class="form-group">
        <label for="name">Observação:</label><br>
        <textarea class="form-control" name="description" id="description"  placeholder="Faça uma pequena descrição" rows="3"><?= $contact['description'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary mb-4">Atualizar</button>
    </form>
    </div>
<?php
include_once("templates/footer.php");
?>