<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC Project</title>
</head>
<body>

<nav class="blue darken-2">
    <div class="nav-wrapper container">
        <a href="#" data-target="mobile-demo" class="sidenav-trigger right">
            <img src="/MVC/config/materialize/img/menu-svgrepo-com.svg" alt="Menu Icon" style="width: 10px; margin-right: 5px;">
        </a>
        <a href="?router=Site/home/" class="brand-logo light">Cadastro Geral</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="?router=Site/consulta_funcionario/">Funcionários</a></li>
            <li><a href="?router=Site/consulta_cargo/">Cargos</a></li>
            <li><a href="?router=Site/report/">Relatórios</a></li>
        </ul>
    </div>
</nav>

<ul class="sidenav" id="mobile-demo">
    <li><a href="?router=Site/consulta_funcionario/">Funcionários</a></li>
    <li><a href="?router=Site/consulta_cargo/">Cargos</a></li>
    <li><a href="?router=Site/report/">Relatórios</a></li>
</ul>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems, { edge: 'left' });
    });
</script>

</body>
</html>
