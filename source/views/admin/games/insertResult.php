<div class="ui container" style="margin-top: 60px;margin-bottom: 60px;">
    <form method="POST">
        <div class="ui large header">Inserir Resultado</div>
        <div class="placar-aposta-container">
            <div class="bandeiras">
                <div class="time">
                    <img class="ui tiny image" id="imagem_card_casa" src="<?= BASE_URL; ?>assets/imgs/<?= $time_casa['logo'] ?>">
                    <div class="nome_time">
                        <?= $time_casa['nome'] ?>
                    </div>
                </div>
                <div class="versus">
                    <div class="ui input">
                        <input type="number" name="time_casa">
                    </div>
                    <span>X</span>
                    <div class="ui input">
                        <input type="number" name="time_visitante">
                    </div>
                </div>
                <div class="time">
                    <img class="ui tiny image" id="imagem_card_casa" src="<?= BASE_URL; ?>assets/imgs/<?= $time_visitante['logo'] ?>">
                    <div class="nome_time">
                        <?= $time_visitante['nome'] ?>
                    </div>
                </div>
            </div>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <input type="submit" value="Registar Resultado" class="positive ui button">
        </div>
    </form>
</div>