<div class="ui container" style="margin-top: 60px;margin-bottom: 60px;">
    <?php if(isset($_GET['erro']) && !empty($_GET['erro'])): ?>
    <div class="ui negative message">
      <i class="close icon"></i>
      <div class="header">
        <?= $_GET['erro'] ?>
      </div>
    </div>
    <?php endif; ?>
    <div class="ui large header">Campeonatos Cadastrados</div>
    <div style="margin-top: 30px;margin-bottom: 30px">
        <a href="<?= BASE_URL ?>adminLeagues/newLeague" class="positive ui button">Cadastrar Campeonato</a>

        <div class="ui icon input">
            <input type="text" placeholder="Pesquisa...">
            <i class="search icon"></i>
        </div>
    </div>

    <table class="ui celled padded table">
        <thead>
        <tr>
            <th class="single line">ID</th>
            <th class="single line">Nome</th>
            <th class="single line">Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($campeonatos as $campeonato): ?>
            <tr>
                <td><?= $campeonato['id']; ?></td>
                <td><?= $campeonato['nome']; ?></td>
                <td class="single line">
                    <a href="<?= BASE_URL ?>adminLeagues/deleteLeague/<?= $campeonato['id']; ?>" class="ui icon red button" data-tooltip="Excluir Campeonato" data-position="bottom left" data-inverted=""><i class="trash icon"></i></a>
                    <a href="<?= BASE_URL ?>adminLeagues/editLeague/<?= $campeonato['id']; ?>" class="ui icon orange button" data-tooltip="Editar Campeonato" data-position="bottom left" data-inverted=""><i class="edit icon"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


</div>