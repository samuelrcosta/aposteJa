<div class="ui container" style="margin-top: 60px;margin-bottom: 60px;">
    <?php if(isset($_GET['erro']) && !empty($_GET['erro'])): ?>
        <div class="ui negative message">
            <i class="close icon"></i>
            <div class="header">
                <?= $_GET['erro'] ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="ui large header">Times Cadastrados</div>
    <div style="margin-top: 30px;margin-bottom: 30px">
        <a href="<?= BASE_URL ?>adminTeams/newTeam" class="positive ui button">Cadastrar Time</a>
        <div class="ui icon input">
            <input type="text" id="pesquisa_input" placeholder="Pesquisa..." onkeyup="pesquisa()">
            <i class="search icon"></i>
        </div>
    </div>
    <table class="ui celled padded table" id="teams_table">
        <thead>
        <tr>
            <th class="single line">ID</th>
            <th class="single line">Nome</th>
            <th class="single line">Imagem</th>
            <th class="single line">Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($times as $time): ?>
            <tr>
                <td><?= $time['id']; ?></td>
                <td><?= $time['nome']; ?></td>
                <td><img style="max-width: 50px;" src="<?= BASE_URL; ?>assets/imgs/Times/<?= $time['logo']; ?>" /></td>
                <td class="single line">
                    <a href="<?= BASE_URL ?>adminTeams/deleteTeam/<?= $time['id']; ?>" class="ui icon red button" data-tooltip="Excluir Time" data-position="bottom left" data-inverted=""><i class="trash icon"></i></a>
                    <a href="<?= BASE_URL ?>adminTeams/editTeam/<?= $time['id']; ?>" class="ui icon orange button" data-tooltip="Editar Time" data-position="bottom left" data-inverted=""><i class="edit icon"></i></a>
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
        table = document.getElementById("teams_table");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for(i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if(td){
                if(td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>