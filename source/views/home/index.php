<link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/css/home.css">
<div id="titulo-principal">
    O site para fazer apostas onlines dos jogos de futebol que ocorrem no mundo
</div>
<div id="subtitulo">
    Jogos mais populares
</div>
<div class="ui cards">
    <?php foreach ($games as $game): ?>
    <div class="card">
        <div class="content">
            <a href="<?= BASE_URL; ?>game/open/<?= $game['id']; ?>" style="display: block; color: black">
                <div id="bandeiras">
                    <div id="time_casa">
                        <img class="ui tiny image" id="imagem_card_casa" src="<?= BASE_URL; ?>assets/imgs/Times/<?= $game['logo_time_casa']; ?>">
                        <div id = "nome_time_fora">
                            <?= $game['time_casa']; ?>
                        </div>
                    </div>
                    <div id="versus">
                        X
                    </div>
                    <div id="time_fora">
                        <img class="ui tiny image" id="imagem_card_casa" src="<?= BASE_URL; ?>assets/imgs/Times/<?= $game['logo_time_visitante']; ?>">
                        <div id="nome_time_fora">
                            <?= $game['time_visitante']; ?>
                        </div>
                    </div>
                </div>
                <div id="icons">
                    <div id="data_jogo">
                        <i class="calendar outline icon"></i>
                        <?= $game['data']; ?>
                    </div>
                    <div id="local_jogo">
                        <i class="map pin icon"></i>
                        <?= $game['local']; ?>
                    </div>
                    <div id="horario_jogo">
                        <i class="clock outline icon"></i>
                        <?= $game['hora']; ?>
                    </div>
                    <div id="valor_jogo">
                        <i class="money bill alternate outline icon"></i>
                        R$ <?= number_format($game['valor'], 2, ",", "."); ?>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<div id="pesquisa">
    Quer encontrar mais jogos?
</div>

<div class="ui search" style="margin-bottom: 50px;">
    <div class="ui icon input">
        <input class="prompt" placeholder="Informe um time" type="text">
        <div id="pesquisa_link">
            <a href = "<?= BASE_URL; ?>search/index/Alemanha">
                <i class="search icon"></i>
            </a>
        </div>
    </div>
    <div class="results"></div>
</div>