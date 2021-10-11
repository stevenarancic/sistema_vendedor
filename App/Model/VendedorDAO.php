<?php

namespace App\Model;

use PDO;

class VendedorDAO
{
    public function createVendedor(Vendedor $vendedor)
    {
        $sql = "INSERT INTO vendedor(nome, sobrenome, telefone1, telefone2, email, facebook, instagram, imagem_perfil) VALUES(:nome, :sobrenome, :telefone1, :telefone2, :email, :facebook, :instagram, :imagem_perfil)";

        $statement = Conexao::getInstance()->prepare($sql);

        $statement->bindValue(':nome', $vendedor->getNome());
        $statement->bindValue(':sobrenome', $vendedor->getSobrenome());
        $statement->bindValue(':telefone1', $vendedor->getTelefone1());
        $statement->bindValue(':telefone2', $vendedor->getTelefone2());
        $statement->bindValue(':email', $vendedor->getEmail());
        $statement->bindValue(':facebook', $vendedor->getFacebook());
        $statement->bindValue(':instagram', $vendedor->getInstagram());
        $statement->bindValue(':imagem_perfil', $vendedor->getImagem_perfil());

        $statement->execute();
    }

    public function readVendedor()
    {
        $sql = "SELECT * FROM vendedor";

        $statement = Conexao::getInstance()->prepare($sql);
        $statement->execute();

        if ($statement->rowCount() > 0) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo "A consulta não retornou resultados :(";
        }
    }

    public function updateVendedor(Vendedor $vendedor)
    {
        $sql = "UPDATE vendedor SET nome = :nome, sobrenome = :sobrenome, telefone1 = :telefone1, telefone2 = :telefone2, email = :email, facebook = :facebook, instagram = :instagram WHERE id = :id";

        $statement = Conexao::getInstance()->prepare($sql);

        $statement->bindValue(':id', $vendedor->getId());
        $statement->bindValue(':nome', $vendedor->getNome());
        $statement->bindValue(':sobrenome', $vendedor->getSobrenome());
        $statement->bindValue(':telefone1', $vendedor->getTelefone1());
        $statement->bindValue(':telefone2', $vendedor->getTelefone2());
        $statement->bindValue(':email', $vendedor->getEmail());
        $statement->bindValue(':facebook', $vendedor->getFacebook());
        $statement->bindValue(':instagram', $vendedor->getInstagram());

        $statement->execute();
    }

    public function deleteVendedor($id)
    {
        $sql = "DELETE FROM vendedor WHERE id = :id";

        $statement = Conexao::getInstance()->prepare($sql);

        $statement->bindValue(':id', $id);

        $statement->execute();
    }

    public function filtrarVendedor($id)
    {
        $sql = "SELECT * FROM vendedor WHERE id = :id";

        $statement = Conexao::getInstance()->prepare($sql);

        $statement->bindValue(':id', $id);

        $statement->execute();

        if ($statement->rowCount() > 0) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return "Usuário não encontrado :(";
        }
    }
}
