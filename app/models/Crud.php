<?php

namespace app\models;

class Crud extends Connection
{
    public function createFuncionario()
    {
        $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
        $data_nasc = filter_input(INPUT_POST, "data_nasc", FILTER_VALIDATE_REGEXP, array(
            "options" => array("regexp" => "/^\d{4}-\d{2}-\d{2}$/")
        ));
        $cep = filter_input(INPUT_POST, "cep", FILTER_VALIDATE_INT);
        $logradouro = filter_input(INPUT_POST, "logradouro", FILTER_SANITIZE_SPECIAL_CHARS);
        $numero = filter_input(INPUT_POST, "numero", FILTER_SANITIZE_SPECIAL_CHARS);
        $bairro = filter_input(INPUT_POST, "bairro", FILTER_SANITIZE_SPECIAL_CHARS);
        $cidade = filter_input(INPUT_POST, "cidade", FILTER_SANITIZE_SPECIAL_CHARS);
        $uf = filter_input(INPUT_POST, "uf", FILTER_SANITIZE_SPECIAL_CHARS);
        $cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $telefone = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_SPECIAL_CHARS);
        $id_cargo = filter_input(INPUT_POST, "id_cargo", FILTER_SANITIZE_SPECIAL_CHARS);

        if ($this->isCPFExists($cpf)) {
            echo '<script>alert("Erro: CPF já cadastrado.");</script>';
            echo '<script>window.location.href = "?router=Site/consulta_funcionario";</script>';

            return false;
        }

        if (!$this->isValidCPF($cpf)) {
            echo '<script>alert("CPF inválido.");</script>';
            echo '<script>window.location.href = "?router=Site/consulta_funcionario";</script>';

            return false;
        }


        $conn = $this->connect();

        $sql = "INSERT into funcionario values(default, :nome, :data_nasc, :cep, 
                                                :logradouro, :numero, :bairro, :cidade, 
                                                :uf, :cpf, :email, :telefone,:id_cargo )";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':data_nasc', $data_nasc);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':logradouro', $logradouro);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':uf', $uf);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':id_cargo', $id_cargo);
    
        $stmt->execute();
        echo '<script>alert("Funcionário cadastrado com sucesso.");</script>';
        echo '<script>window.location.href = "?router=Site/consulta_funcionario";</script>';

        return $stmt;

    }
    

    private function isCPFExists($cpf)
    {
        $conn = $this->connect();
        $sql = "SELECT COUNT(*) FROM funcionario WHERE cpf = :cpf";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();

        $count = $stmt->fetchColumn();

        if ($count > 0) {
            return true;
        }

        return false;
    }

    function isValidCPF($cpf)
    {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        if (preg_match('/^(\d)\1*$/', $cpf)) {
            return false;
        }

        $soma1 = $cpf[0] * 10 + $cpf[1] * 9 + $cpf[2] * 8 + $cpf[3] * 7 + $cpf[4] * 6 + $cpf[5] * 5 + $cpf[6] * 4 + $cpf[7] * 3 + $cpf[8] * 2;
        $resto1 = ($soma1 * 10) % 11;
        $resto1 = ($resto1 == 10) ? 0 : $resto1;

        $soma2 = $cpf[0] * 11 + $cpf[1] * 10 + $cpf[2] * 9 + $cpf[3] * 8 + $cpf[4] * 7 + $cpf[5] * 6 + $cpf[6] * 5 + $cpf[7] * 4 + $cpf[8] * 3 + $cpf[9] * 2;
        $resto2 = ($soma2 * 10) % 11;
        $resto2 = ($resto2 == 10) ? 0 : $resto2;

        return ($resto1 == $cpf[9] && $resto2 == $cpf[10]);
    }
    


    public function createCargo()
    {
        if (isset($_POST['id_cargo']) && !empty($_POST['id_cargo'])) {
            $cargo = filter_input(INPUT_POST, "cargo", FILTER_SANITIZE_SPECIAL_CHARS);
            $salario = filter_input(INPUT_POST, "salario", FILTER_SANITIZE_SPECIAL_CHARS);

            if ($this->isCargoExists($cargo)) {
                echo '<script>alert("Erro: Cargo já cadastrado.");</script>';
                echo '<script>window.location.href = "?router=Site/consulta_cargo";</script>';
                return false;
            } else {

                $conn = $this->connect();
                $sql = "INSERT into cargo values(default, :cargo, :salario )";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':cargo', $cargo);
                $stmt->bindParam(':salario', $salario);

                $stmt->execute();

                echo '<script>window.location.href = "?router=Site/consulta_cargo";</script>';

                return $stmt;
            }
        }
    }

    private function isCargoExists($cargo)
    {
        $conn = $this->connect();
        $sql = "SELECT COUNT(*) FROM cargo WHERE cargo = :cargo";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':cargo', $cargo);
        $stmt->execute();

        $count = $stmt->fetchColumn();

        return $count > 0;
    }


    public function readFunc()
    {

        $conn = $this->connect();
        $sql = "SELECT f.id_funcionario, f.nome, f.cpf, f.id_cargo, f.telefone, c.cargo, c.salario 
                FROM funcionario AS f
                JOIN cargo AS c ON f.id_cargo = c.id_cargo";;

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();
        return $result;

        
    }      

    public function readCargo()
    {

        $conn = $this->connect();
        $sql = "SELECT f.id_cargo, f.cargo, f.salario
                FROM cargo AS f";;

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();
        return $result;

        
    }

    public function updateFuncionario()
    {
        $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
        $data_nasc = filter_input(INPUT_POST, "data_nasc", FILTER_VALIDATE_REGEXP, array(
            "options" => array("regexp" => "/^\d{4}-\d{2}-\d{2}$/")
        ));
        $cep = filter_input(INPUT_POST, "cep", FILTER_VALIDATE_INT);
        $logradouro = filter_input(INPUT_POST, "logradouro", FILTER_SANITIZE_SPECIAL_CHARS);
        $numero = filter_input(INPUT_POST, "numero", FILTER_VALIDATE_INT);
        $bairro = filter_input(INPUT_POST, "bairro", FILTER_SANITIZE_SPECIAL_CHARS);
        $cidade = filter_input(INPUT_POST, "cidade", FILTER_SANITIZE_SPECIAL_CHARS);
        $uf = filter_input(INPUT_POST, "uf", FILTER_SANITIZE_SPECIAL_CHARS);
        $cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $telefone = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_SPECIAL_CHARS);
        $id_cargo = filter_input(INPUT_POST, "id_cargo", FILTER_VALIDATE_INT);
        $id_funcionario = filter_input(INPUT_POST, "id_funcionario", FILTER_VALIDATE_INT);

        $conn = $this->connect();
        $sql = "UPDATE funcionario SET nome = :nome, data_nasc = :data_nasc, cep = :cep, 
                                    logradouro = :logradouro, numero = :numero, bairro = :bairro, cidade = :cidade, 
                                    uf = :uf, cpf = :cpf, email = :email, telefone = :telefone, id_cargo = :id_cargo 
                                    WHERE id_funcionario = :id_funcionario";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':data_nasc', $data_nasc);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':logradouro', $logradouro);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':uf', $uf);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':id_cargo', $id_cargo);
        $stmt->bindParam(':id_funcionario', $id_funcionario);

        $stmt->execute();
        echo '<script>alert("Alterações realizadas com sucesso.");</script>';

        return $stmt;
    }


    public function updateCargo()
    {
        $id_cargo = filter_input(INPUT_POST, "id_cargo", FILTER_SANITIZE_SPECIAL_CHARS);
        $cargo = filter_input(INPUT_POST, "cargo", FILTER_SANITIZE_SPECIAL_CHARS);
        $salario = filter_input(INPUT_POST, "salario", FILTER_SANITIZE_SPECIAL_CHARS);

        $conn = $this->connect();
        $sql = "UPDATE cargo SET cargo = :cargo, salario = :salario
                                WHERE id_cargo = :id_cargo";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':cargo', $cargo);
        $stmt->bindParam(':salario', $salario);
        $stmt->bindParam(':id_cargo', $id_cargo);

        $stmt->execute();
        return $stmt;
    }


    public function deleteFuncionario()
    {
        $id_funcionario = base64_decode(filter_input(INPUT_GET, 'id_funcionario', FILTER_SANITIZE_SPECIAL_CHARS));
        $conn = $this->connect();
        $sql = "DELETE FROM funcionario WHERE id_funcionario = :id_funcionario";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_funcionario', $id_funcionario);
        $stmt->execute();
        return $stmt;


    }

    public function deleteCargo()
    {
        $id_cargo = base64_decode(filter_input(INPUT_GET, 'id_cargo', FILTER_SANITIZE_SPECIAL_CHARS));
        $conn = $this->connect();
        $sql = "DELETE FROM cargo WHERE id_cargo = :id_cargo";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_cargo', $id_cargo);
        $stmt->execute();
        return $stmt;


    }

    public function getCargos()
    {
        $conn = $this->connect();
        $sql = "SELECT id_cargo, cargo, salario FROM cargo";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function editFuncionario()
    {
        $id_funcionario = base64_decode(filter_input(INPUT_GET, 'id_funcionario' , FILTER_SANITIZE_SPECIAL_CHARS));
        

        $conn = $this->connect();
        $sql = "SELECT * FROM funcionario WHERE id_funcionario = :id_funcionario";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_funcionario', $id_funcionario);                                        
        $stmt->execute();

        $result = $stmt->fetchAll();
        $cargos = $this->getCargos();
        return $result;
        
    }

    public function editCargo()
    {
        $id_cargo = base64_decode($_GET['id_cargo']);
        

        $conn = $this->connect();
        $sql = "SELECT * FROM cargo WHERE id_cargo = :id_cargo";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_cargo', $id_cargo);                                        
        $stmt->execute();

        $result = $stmt->fetchAll();


        return $result;
        
    }

    public function searchFuncionario($searchTerm)
    {
        $conn = $this->connect();
        $searchTerm = '%' . $searchTerm . '%';

        $sql = "SELECT f.id_funcionario, f.nome, f.cpf, f.id_cargo, c.cargo, c.salario 
                FROM funcionario AS f
                JOIN cargo AS c ON f.id_cargo = c.id_cargo
                WHERE f.nome LIKE :searchTerm OR f.cpf LIKE :searchTerm";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':searchTerm', $searchTerm);
        $stmt->execute();

        $result = $stmt->fetchAll();
        return $result;
    }

    public function searchCargo($searchTerm)
    {
        $conn = $this->connect();
        $searchTerm = '%' . $searchTerm . '%';

        $sql = "SELECT f.id_cargo, f.cargo, f.salario
                FROM cargo AS f
                WHERE f.cargo LIKE :searchTerm OR f.cargo LIKE :searchTerm";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':searchTerm', $searchTerm);
        $stmt->execute();

        $result = $stmt->fetchAll();
        return $result;
    }

    public function searchFuncionarioReport($searchTerm, $filterType)
    {
        $conn = $this->connect();
        $searchTerm = '%' . $searchTerm . '%';
    
        $sql = "SELECT f.id_funcionario, f.nome, f.telefone, c.cargo AS cargo, c.salario
                FROM funcionario AS f
                JOIN cargo AS c ON f.id_cargo = c.id_cargo
                WHERE ";
    
        if ($filterType === 'nome') {
            $sql .= "f.nome LIKE :searchTerm";
        } elseif ($filterType === 'cargo') {
            $sql .= "c.cargo LIKE :searchTerm";
        }
    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':searchTerm', $searchTerm);
        $stmt->execute();
    
        $result = $stmt->fetchAll();
        return $result;
    }
}