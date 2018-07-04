<div class="ui container" style="margin-top: 60px;margin-bottom: 60px;">
    <div class="ui large header">Jogos Cadastrados</div>
    <div style="margin-top: 30px;margin-bottom: 30px">
        <a href="<?= BASE_URL ?>adminGames/newGame" class="positive ui button">Cadastrar Jogo</a>

        <div class="ui icon input">
            <input type="text" placeholder="Pesquisa...">
            <i class="search icon"></i>
        </div>
    </div>

    <table class="ui celled padded table">
        <thead>
        <tr>
            <th class="single line">ID</th>
            <th class="single line">Data do Jogo</th>
            <th class="single line">Campeonato</th>
            <th class="single line">Time da Casa</th>
            <th class="single line">Time Visitante</th>
            <th class="single line">Local</th>
            <th class="single line">Horário</th>
            <th class="single line">Valor</th>
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
                <td></td>
                <td>R$ <?= $jogo['valor']; ?></td>
                <td><span class="yellow"><?= $jogo['status']; ?></span></td>
                <td class="single line">
                    <a href="<?= BASE_URL ?>adminGames/deleteGame/<?= $jogo['id']; ?>" class="ui icon red button" data-tooltip="Excluir Jogo" data-position="bottom left" data-inverted=""><i class="trash icon"></i></a>
                    <a href="<?= BASE_URL ?>adminGames/editGame/<?= $jogo['id']; ?>" class="ui icon orange button" data-tooltip="Editar Jogo" data-position="bottom left" data-inverted=""><i class="edit icon"></i></a>
                    <a href="<?= BASE_URL ?>adminGames/insertResult/<?= $jogo['id']; ?>" class="ui icon green button" data-tooltip="Inserir Resultado" data-position="bottom left" data-inverted=""><i class="check icon"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td>4</td>
            <td>17/06/2018</td>
            <td class="single line">Copa do Mundo</td>
            <td>Brasil</td>
            <td>Suíça</td>
            <td class="single line">Rostov, Rússia</td>
            <td>15h</td>
            <td>R$ 15,00</td>
            <td><span class="yellow">Aguardando Resultado</span></td>
            <td class="single line">
                <a href="<?= BASE_URL ?>adminGames/deleteGame/id" class="ui icon red button" data-tooltip="Excluir Jogo" data-position="bottom left" data-inverted=""><i class="trash icon"></i></a>
                <a href="<?= BASE_URL ?>adminGames/editGame/id" class="ui icon orange button" data-tooltip="Editar Jogo" data-position="bottom left" data-inverted=""><i class="edit icon"></i></a>
                <a href="<?= BASE_URL ?>adminGames/insertResult/id" class="ui icon green button" data-tooltip="Inserir Resultado" data-position="bottom left" data-inverted=""><i class="check icon"></i></a>
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td>17/06/2018</td>
            <td class="single line">Copa do Mundo</td>
            <td>Alemanha</td>
            <td>México</td>
            <td class="single line">Moscou, Rússia</td>
            <td>12h</td>
            <td>R$ 8,00</td>
            <td><span class="yellow">Aguardando Resultado</span></td>
            <td class="single line">
                <a href="<?= BASE_URL ?>adminGames/deleteGame/id" class="ui icon red button" data-tooltip="Excluir Jogo" data-position="bottom left" data-inverted=""><i class="trash icon"></i></a>
                <a href="<?= BASE_URL ?>adminGames/editGame/id" class="ui icon orange button" data-tooltip="Editar Jogo" data-position="bottom left" data-inverted=""><i class="edit icon"></i></a>
                <a href="<?= BASE_URL ?>adminGames/insertResult/id" class="ui icon green button" data-tooltip="Inserir Resultado" data-position="bottom left" data-inverted=""><i class="check icon"></i></a>
            </td>
        </tr>
        <tr>
            <td>6</td>
            <td>22/06/2018</td>
            <td class="single line">Copa do Mundo</td>
            <td>Brasil</td>
            <td>Costa Rica</td>
            <td class="single line">São Petersburgo, Rússia</td>
            <td>09h</td>
            <td>R$ 10,00</td>
            <td><span class="yellow">Aguardando Resultado</span></td>
            <td class="single line">
                <a href="<?= BASE_URL ?>adminGames/deleteGame/id" class="ui icon red button" data-tooltip="Excluir Jogo" data-position="bottom left" data-inverted=""><i class="trash icon"></i></a>
                <a href="<?= BASE_URL ?>adminGames/editGame/id" class="ui icon orange button" data-tooltip="Editar Jogo" data-position="bottom left" data-inverted=""><i class="edit icon"></i></a>
                <a href="<?= BASE_URL ?>adminGames/insertResult/id" class="ui icon green button" data-tooltip="Inserir Resultado" data-position="bottom left" data-inverted=""><i class="check icon"></i></a>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>23/06/2018</td>
            <td class="single line">Copa do Mundo</td>
            <td>Alemanha</td>
            <td>Suécia</td>
            <td class="single line">Sochii, Rússia</td>
            <td>15h</td>
            <td>R$ 10,00</td>
            <td><span class="yellow">Aguardando Resultado</span></td>
            <td class="single line">
                <a href="<?= BASE_URL ?>adminGames/deleteGame/id" class="ui icon red button" data-tooltip="Excluir Jogo" data-position="bottom left" data-inverted=""><i class="trash icon"></i></a>
                <a href="<?= BASE_URL ?>adminGames/editGame/id" class="ui icon orange button" data-tooltip="Editar Jogo" data-position="bottom left" data-inverted=""><i class="edit icon"></i></a>
                <a href="<?= BASE_URL ?>adminGames/insertResult/id" class="ui icon green button" data-tooltip="Inserir Resultado" data-position="bottom left" data-inverted=""><i class="check icon"></i></a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>27/06/2018</td>
            <td class="single line">Copa do Mundo</td>
            <td>Brasil</td>
            <td>Sérvia</td>
            <td class="single line">Moscou, Rússia</td>
            <td>15h</td>
            <td>R$ 12,00</td>
            <td><span class="yellow">Aguardando Resultado</span></td>
            <td class="single line">
                <a href="<?= BASE_URL ?>adminGames/deleteGame/id" class="ui icon red button" data-tooltip="Excluir Jogo" data-position="bottom left" data-inverted=""><i class="trash icon"></i></a>
                <a href="<?= BASE_URL ?>adminGames/editGame/id" class="ui icon orange button" data-tooltip="Editar Jogo" data-position="bottom left" data-inverted=""><i class="edit icon"></i></a>
                <a href="<?= BASE_URL ?>adminGames/insertResult/id" class="ui icon green button" data-tooltip="Inserir Resultado" data-position="bottom left" data-inverted=""><i class="check icon"></i></a>
            </td>
        </tr>
        <tr>
            <td>7</td>
            <td>27/06/2018</td>
            <td class="single line">Copa do Mundo</td>
            <td>Alemanha</td>
            <td>Coreia do Sul</td>
            <td class="single line">Moscou, Rússia</td>
            <td>11h</td>
            <td>R$ 5,00</td>
            <td><span class="yellow">Aguardando Resultado</span></td>
            <td class="single line">
                <a href="<?= BASE_URL ?>adminGames/deleteGame/id" class="ui icon red button" data-tooltip="Excluir Jogo" data-position="bottom left" data-inverted=""><i class="trash icon"></i></a>
                <a href="<?= BASE_URL ?>adminGames/editGame/id" class="ui icon orange button" data-tooltip="Editar Jogo" data-position="bottom left" data-inverted=""><i class="edit icon"></i></a>
                <a href="<?= BASE_URL ?>adminGames/insertResult/id" class="ui icon green button" data-tooltip="Inserir Resultado" data-position="bottom left" data-inverted=""><i class="check icon"></i></a>
            </td>
        </tr>
        </tbody>
    </table>
</div>