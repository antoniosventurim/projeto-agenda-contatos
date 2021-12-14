<?php
session_start();

include_once("connection.php");
include_once("url.php");


$data = $_POST;

// MODIFICAÇÕES NO BANCO
if (!empty($data)) {

    // Criar contato

    if ($data["type"] === "create") {

        $name = $data["name"];
        $phone = $data["phone"];
        $email = $data["email"];
        $description = $data["description"];

        $query = "INSERT INTO contacts (name, phone, email, description) VALUES (:name, :phone, :email, :description)";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":description", $description);

        // realizando a conexão com o banco de dados
        try {
            $stmt->execute();
            $_SESSION["msg"] = "Contato criado com sucesso!";
            //ativar o modo de erros
            // Para o software e exibe o erro caso aconteça
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // se ouver erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
        }
    } else if ($data["type"] === "edit") {
        $name = $data["name"];
        $phone = $data["phone"];
        $email = $data["email"];
        $description = $data["description"];
        $id = $data["id"];

        $query = "UPDATE contacts 
                    SET name = :name, phone = :phone, email = :email, description = :description 
                    WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam("description", $description);
        $stmt->bindParam(":id", $id);


        try {
            $stmt->execute();
            $_SESSION["msg"] = "Contato atualizado com sucesso!";
            //ativar o modo de erros
            // Para o software e exibe o erro caso aconteça
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // se ouver erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
        }
    } else if($data["type"] === "delete"){
        $id = $data["id"];
        

        $query = "DELETE FROM contacts WHERE id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);


        try {
            $stmt->execute();
            $_SESSION["msg"] = "Contato deletado com sucesso!";
            //ativar o modo de erros
            // Para o software e exibe o erro caso aconteça
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // se ouver erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
        }


    }
    // REDIRECT HOME
    header("location:" . $BASE_URL . "../index.php");

    // SELEÇÃO DE DADOS    
} else {

    $id;

    if (!empty($_GET)) {
        $id = $_GET["id"];
    }


    if (!empty($id)) {

        $query = "SELECT * FROM contacts WHERE id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $contact = $stmt->fetch();
    } else {
        // RETORNA TODOS OS CONTADOS
        $contacts = [];

        $query = "SELECT * FROM contacts";

        $stmt = $conn->prepare($query);

        $stmt->execute();

        $contacts = $stmt->fetchAll();
    }
}

// FECHAR CONEXÃO

$conn = null;
