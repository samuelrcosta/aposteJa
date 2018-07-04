<link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/css/home.css">
<div id="titulo-principal">
    O site para fazer apostas onlines dos jogos de futebol que ocorrem no mundo
</div>
<div id="subtitulo">
    Jogos mais populares
</div>
<div class="ui cards">
    <div class="card">
        <div class="content">
            <a href="<?= BASE_URL; ?>game/open/id" style="display: block; color: black">
                <div id="bandeiras">
                    <div id="time_casa">
                        <img class="ui tiny image" id="imagem_card_casa" src="<?= BASE_URL; ?>assets/imgs/bandeira_brasil.PNG">
                        <div id = "nome_time_fora">
                            Brasil
                        </div>
                    </div>
                    <div id="versus">
                        X
                    </div>
                    <div id="time_fora">
                        <img class="ui tiny image" id="imagem_card_casa" src="<?= BASE_URL; ?>assets/imgs/bandeira_suica.jpg">
                        <div id="nome_time_fora">
                            Suíça
                        </div>
                    </div>
                </div>
                <div id="icons">
                    <div id="data_jogo">
                        <i class="calendar outline icon"></i>
                        17/06/2018
                    </div>
                    <div id="local_jogo">
                        <i class="map pin icon"></i>
                        Rostov, Rússia
                    </div>
                    <div id="horario_jogo">
                        <i class="clock outline icon"></i>
                        15h
                    </div>
                    <div id="valor_jogo">
                        <i class="money bill alternate outline icon"></i>
                        R$ 15.00
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="card">
        <div class="content">
            <a href="<?= BASE_URL; ?>game/open/id" style="display: block; color: black">
                <div id="bandeiras">
                    <div id="time_casa">
                        <img class="ui tiny image" id="imagem_card_casa" src="<?= BASE_URL; ?>assets/imgs/bandeira_brasil.PNG">
                        <div id="nome_time_fora">
                            Brasil
                        </div>
                    </div>
                    <div id="versus">
                        X
                    </div>
                    <div id="time_fora">
                        <img class="ui tiny image" id="imagem_card_casa" src="<?= BASE_URL; ?>assets/imgs/bandeira_costa_rica.png">
                        <div id="nome_time_fora">
                            Costa Rica
                        </div>
                    </div>
                </div>
                <div id="icons">
                    <div id="data_jogo">
                        <i class="calendar outline icon"></i>
                        22/06/2018
                    </div>
                    <div id="local_jogo">
                        <i class="map pin icon"></i>
                        São Petersburgo, Rússia
                    </div>
                    <div id="horario_jogo">
                        <i class="clock outline icon"></i>
                        09h
                    </div>
                    <div id="valor_jogo">
                        <i class="money bill alternate outline icon"></i>
                        R$ 10.00
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="card">
        <div class="content">
            <a href="<?= BASE_URL; ?>game/open/id" style="display: block; color: black">
                <div id="bandeiras">
                    <div id="time_casa">
                        <img class="ui tiny image" id="imagem_card_casa" src="<?= BASE_URL; ?>assets/imgs/bandeira_brasil.PNG">
                        <div id="nome_time_fora">
                            Brasil
                        </div>
                    </div>
                    <div id="versus">
                        X
                    </div>
                    <div id="time_fora">
                        <img class="ui tiny image" id="imagem_card_casa" src="<?= BASE_URL; ?>assets/imgs/bandeira_servia.png">
                        <div id="nome_time_fora">
                            Sérvia
                        </div>
                    </div>
                </div>
                <div id ="icons">
                    <div id="data_jogo">
                        <i class="calendar outline icon"></i>
                        27/06/2018
                    </div>
                    <div id="local_jogo">
                        <i class="map pin icon"></i>
                        Moscou, Rússia
                    </div>
                    <div id="horario_jogo">
                        <i class="clock outline icon"></i>
                        15h
                    </div>
                    <div = "valor_jogo">
                    <i class="money bill alternate outline icon"></i>
                    R$ 12.00
                </div>
        </div>
        </a>
    </div>
</div>
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