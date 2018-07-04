<div class="ui container" style="margin-top: 60px;margin-bottom: 60px;">
    <div class="ui large header">Usuários Cadastrados</div>

    <div style="margin-top: 30px;margin-bottom: 30px">
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
            <th class="single line">E-mail</th>
            <th class="single line">Data de Cadastro</th>
            <th class="single line">Ações</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>5</td>
            <td>João</td>
            <td>joao@gmail.com</td>
            <td>11/06/2018</td>
            <td>
                <a href="<?= BASE_URL; ?>adminUsers/deleteUser/id" class="ui icon red button" data-tooltip="Excluir Usuário" data-position="bottom left" data-inverted=""><i class="trash icon"></i></a>
                <a href="<?= BASE_URL; ?>adminUsers/editUser/id" class="ui icon orange button" data-tooltip="Editar Usuário" data-position="bottom left" data-inverted=""><i class="edit icon"></i></a>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>Lucas</td>
            <td>lucas@gmail.com</td>
            <td>10/06/2018</td>
            <td>
                <a href="<?= BASE_URL; ?>adminUsers/deleteUser/id" class="ui icon red button" data-tooltip="Excluir Usuário" data-position="bottom left" data-inverted=""><i class="trash icon"></i></a>
                <a href="<?= BASE_URL; ?>adminUsers/editUser/id" class="ui icon orange button" data-tooltip="Editar Usuário" data-position="bottom left" data-inverted=""><i class="edit icon"></i></a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Matheus</td>
            <td>matheus@gmail.com</td>
            <td>08/06/2018</td>
            <td>
                <a href="<?= BASE_URL; ?>adminUsers/deleteUser/id" class="ui icon red button" data-tooltip="Excluir Usuário" data-position="bottom left" data-inverted=""><i class="trash icon"></i></a>
                <a href="<?= BASE_URL; ?>adminUsers/editUser/id" class="ui icon orange button" data-tooltip="Editar Usuário" data-position="bottom left" data-inverted=""><i class="edit icon"></i></a>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>José</td>
            <td>jose@gmail.com</td>
            <td>01/06/2018</td>
            <td>
                <a href="<?= BASE_URL; ?>adminUsers/deleteUser/id" class="ui icon red button" data-tooltip="Excluir Usuário" data-position="bottom left" data-inverted=""><i class="trash icon"></i></a>
                <a href="<?= BASE_URL; ?>adminUsers/editUser/id" class="ui icon orange button" data-tooltip="Editar Usuário" data-position="bottom left" data-inverted=""><i class="edit icon"></i></a>
            </td>
        </tr>
        </tbody>
    </table>
</div>