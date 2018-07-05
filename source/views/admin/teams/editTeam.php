<div class="ui container" style="margin-top: 60px;margin-bottom: 60px;">
    <div class="ui large header">Editar Time</div>

    <form class="ui form" method="POST" enctype="multipart/form-data">
        <div class="ui grid container">
            <div class="ten wide column">
                <div class="field">
                    <label>Nome do Time</label>
                    <input type="text" name="nome" required placeholder="Nome do time" value="<?= $time['nome']; ?>">
                </div>

                <div class="field">
                    <div class="ui action input">
                        <input type="text" placeholder="Caso queira alterar a imagem, envie um arquivo" readonly>
                        <input type="file" name="imagem" />
                        <div class="ui icon button">
                            <i class="attach icon"></i>
                        </div>
                    </div>
                </div>

                <div>
                    <p>Imagem cadastrada:</p>
                    <img style="max-width: 90px;" src="<?= BASE_URL; ?>assets/imgs/Times/<?= $time['logo']; ?>">
                </div>

                <?php if(isset($mensagem) && !empty($mensagem)): ?>
                    <div class="ui negative message">
                        <i class="close icon"></i>
                        <div class="header">
                            <?= $mensagem; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <input type="submit" value="Salvar" class="ui fluid large green button" style="margin-top: 20px; width: 100%" tabindex="1">
            </div>
        </div>
    </form>
</div>