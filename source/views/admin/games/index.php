<div class="ui container" style="margin-top: 60px;margin-bottom: 60px;">
    <div class="ui large header">Jogos Cadastrados</div>
    <div style="margin-top: 30px;margin-bottom: 30px">
        <a href="<?= BASE_URL ?>adminGames/newGame" class="positive ui button">Cadastrar Jogo</a>

        <div class="ui icon input">
            <input type="text" id="pesquisa_input" placeholder="Pesquisa..." onkeyup="pesquisa()">
            <i class="search icon"></i>
        </div>
    </div>

    <table class="ui celled padded table" id="games_table">
        <thead>
        <tr>
            <th class="single line">ID</th>
            <th class="single line">Data do Jogo</th>
            <th class="single line">Campeonato</th>
            <th class="single line">Time da Casa</th>
            <th class="single line">Time Visitante</th>
            <th class="single line">Local</th>
            <th class="single line">Valor</th>
            <th class="single line">Placar</th>
            <th class="single line">Status</th>
            <th class="single line">Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($jogos as $jogo): ?>
            <tr>
                <td><?= $jogo['id']; ?></td>
                <td><?= $jogo['data']; ?></td>
                <td class="single line"><?= $jogo['campeonato']; ?></td>
                <td><?= $jogo['time_casa']; ?></td>
                <td><?= $jogo['time_visitante']; ?></td>
                <td class="single line"><?= $jogo['local']; ?></td>
                <td class="single line">R$ <?= number_format($jogo['valor'], 2, ",", "."); ?></td>
                <td class="single line"><?= ($jogo['status'] == 'sem_resultado')? 'Indisponível' : $jogo['resultado_casa'].' x '.$jogo['resultado_visitante'] ?></td>
                <td><span class="<?= ($jogo['status'] == 'sem_resultado')? 'yellow' : 'green' ?>"><?= ($jogo['status'] == 'sem_resultado')? 'Aguardando Resultado' : 'Concluído' ?></span></td>
                <td class="single line">
                    <a href="<?= BASE_URL ?>adminGames/deleteGame/<?= $jogo['id']; ?>" class="ui icon red button" data-tooltip="Excluir Jogo" data-position="bottom left" data-inverted=""><i class="trash icon"></i></a>
                    <a href="<?= BASE_URL ?>adminGames/editGame/<?= $jogo['id']; ?>" class="ui icon orange button" data-tooltip="Editar Jogo" data-position="bottom left" data-inverted=""><i class="edit icon"></i></a>
                    <?php if($jogo['status'] == 'sem_resultado'): ?>
                    <a href="<?= BASE_URL ?>adminGames/insertResult/<?= $jogo['id']; ?>" class="ui icon green button" data-tooltip="Inserir Resultado" data-position="bottom left" data-inverted=""><i class="check icon"></i></a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    function pesquisa() {
        // Declare variables
        let input, filter, table, tr, td, i;
        input = document.getElementById("pesquisa_input");
        filter = input.value.toUpperCase();
        table = document.getElementById("games_table");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for(i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            let casa = tr[i].getElementsByTagName("td")[3];
            let visitante = tr[i].getElementsByTagName("td")[4];
            if(td && casa && visitante){
                if(td.innerHTML.toUpperCase().indexOf(filter) > -1 || casa.innerHTML.toUpperCase().indexOf(filter) > -1 || visitante.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>