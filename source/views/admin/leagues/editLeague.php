<div class="ui container" style="margin-top: 60px;margin-bottom: 60px;">
    <div class="ui large header">Editar Campeonato</div>

    <form class="ui form" method="POST">
        <h4 class="ui dividing header">Nome do Campeonato</h4>
        <div class="fields">
            <div class="three wide field">
                <label>Nome</label>
                <input type="text" name="nome" required maxlength="" placeholder="" value="<?= $league['nome'] ?>">
            </div>
        </div>
  
        <input type="submit" value="Salvar" class="ui fluid large green button" style="margin-top: 20px" tabindex="1">
    </form>