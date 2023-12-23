<?php

namespace app\controllers;

use app\models\Crud;

class Site extends Crud
{

    public function home()
    {

        $consulta = $this->readFunc();

        require_once __DIR__ . '/../views/nav.php';

        require_once __DIR__ . '/../views/home.php';
    }

    public function report()
    {

        $consulta = $this->readFunc();

        require_once __DIR__ . '/../views/nav.php';

        require_once __DIR__ . '/../views/results.php';
    }

    public function cadastro_funcionario()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $cadastro = $this->createFuncionario();
        }

        $cargos = $this->getCargos();

        require_once __DIR__ . '/../views/cadastro_funcionario.php';
    }

    public function cadastro_cargo()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $cadastro = $this->createCargo();
        }

        require_once __DIR__ . '/../views/cadastro_cargo.php';
    }

    public function consulta_funcionario()
    {
        $consulta = $this->readFunc();


        require_once __DIR__ . '/../views/nav.php';


        require_once __DIR__ . '/../views/consulta_funcionario.php';
    }

    public function consulta_cargo()
    {
        $consulta = $this->readCargo();

        require_once __DIR__ . '/../views/nav.php';


        require_once __DIR__ . '/../views/consulta_cargo.php';
    }


    public function editar_funcionario()
    {
        $editarFuncionario = $this->editFuncionario();
        $cargos = $this->getCargos();

        require_once __DIR__ . '/../views/nav.php';


        require_once __DIR__ . '/../views/edit_funcionario.php';
    }
    public function editar_Cargo()
    {
        $editarCargo = $this->editCargo();

        require_once __DIR__ . '/../views/nav.php';


        require_once __DIR__ . '/../views/edit_cargo.php';
    }

    public function alterar_funcionario()
    {
        $alterar = $this->updateFuncionario();
        header("Location:?router=Site/consulta_funcionario/");
    }

    public function alterar_cargo()
    {
        $alterar = $this->updateCargo();
        header("Location:?router=Site/consulta_cargo/");
    }
    public function confirmarDelete_funcionario()
    {
        $id_funcionario = filter_input(INPUT_GET, "id_funcionario", FILTER_SANITIZE_SPECIAL_CHARS);

        require_once __DIR__ . '/../views/nav.php';

        require_once __DIR__ . '/../views/confirmaDelete_funcionario.php';
    }
    public function confirmarDelete_Cargo()
    {
        $id_cargo = filter_input(INPUT_GET, "id_cargo", FILTER_SANITIZE_SPECIAL_CHARS);

        require_once __DIR__ . '/../views/nav.php';

        require_once __DIR__ . '/../views/confirmaDelete_cargo.php';
    }

    public function deletarFuncionario()
    {
        $id_funcionario = filter_input(INPUT_GET, "id_funcionario", FILTER_SANITIZE_SPECIAL_CHARS);

        $deletar = $this->deleteFuncionario();


        header("Location:?router=Site/consulta_funcionario/");
    }


    public function deletarCargo()
    {
        $id_funcionario = filter_input(INPUT_GET, "id_cargo", FILTER_SANITIZE_SPECIAL_CHARS);

        $deletar = $this->deleteCargo();


        header("Location:?router=Site/consulta_cargo/");
    }

    public function pesquisarFuncionarios()
    {
        $searchTerm = filter_input(INPUT_GET, 'searchTerm', FILTER_SANITIZE_SPECIAL_CHARS);

        $consulta = $this->searchFuncionario($searchTerm);

        require_once __DIR__ . '/../views/search_func_table.php';
    }

    public function pesquisarFuncionariosReport()
    {
        $searchTerm = filter_input(INPUT_GET, 'searchTerm', FILTER_SANITIZE_SPECIAL_CHARS);
        $filterType = filter_input(INPUT_GET, 'filterType', FILTER_SANITIZE_SPECIAL_CHARS);

        $consulta = $this->searchFuncionarioReport($searchTerm, $filterType);

        require_once __DIR__ . '/../views/search_func_table_report.php';
    }


    public function pesquisarCargo()
    {
        $searchTerm = filter_input(INPUT_GET, 'searchTerm', FILTER_SANITIZE_SPECIAL_CHARS);

        $consulta = $this->searchCargo($searchTerm);

        require_once __DIR__ . '/../views/search_cargo_table.php';
    }

 
}
