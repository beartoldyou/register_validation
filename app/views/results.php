<div class="row container">
    <div class="col s12">
        <h3 class="light">Relatórios</h3>
    </div>
    <div class="col s12">
        <form action="?router=Site/pesquisarFuncionariosReport" method="GET" onsubmit="return false">
            <div class="input-field">
                <input id="search" name="searchTerm" type="search" class="icon_prefix" required>
                <label class="" for="search"><i class="material-icons">Busque por Nome ou Cargo</i></label>
            </div>
            <div>
                <button class="btn blue darken-3 fixed
" type="button" onclick="pesquisarFuncionariosReport()">Pesquisar</button>
                <label>
                    <input name="filterType" type="radio" value="nome" checked />
                    <span>Nome</span>
                </label>
                <label>
                    <input name="filterType" type="radio" value="cargo" />
                    <span>Cargo</span>
                </label>

            </div>
        </form>

        <div id="resultadoPesquisaReport">
            <?php include_once __DIR__ . '/../views/search_func_table_report.php'; ?>
        </div>
    </div>
</div>