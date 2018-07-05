<div class="ui container" style="margin-top: 60px;margin-bottom: 60px;">
    <div class="ui large header">Editar Campeonato</div>

    <form class="ui form" method="POST">
        <div class="ui grid container">
            <div class="eight wide column">
                <div class="field">
                    <label>Nome do Campeonato</label>
                    <input type="text" name="nome" required maxlength="" placeholder="" value="<?= $league['nome'] ?>">
                </div>

                <input type="submit" value="Salvar" class="ui fluid large green button" style="margin-top: 20px;width: 100%;" tabindex="1">
            </div>
        </div>
    </form>