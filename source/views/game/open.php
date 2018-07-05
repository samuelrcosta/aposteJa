<link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/css/detalhe_jogo.css">
<div class="ui container" style="margin-top: 60px;margin-bottom: 60px;">
    <div class="ui stackable three column grid" style="margin-bottom: 50px;">
        <div class="column">
            <div class="campeonato-jogo">
                <i class="info circle icon"></i>
                <?= $game['campeonato']; ?>
            </div>
            <div class="data-jogo">
                <i class="calendar outline icon"></i>
                <?= $game['dia']; ?>
            </div>
            <div class="local-jogo">
                <i class="map pin icon"></i>
                <?= $game['local']; ?>
            </div>
            <div class="horario_jogo">
                <i class="clock outline icon"></i>
                <?= $game['hora']; ?>
            </div>
        </div>
        <div class="column" style="display: flex; align-items: center; justify-content: center;">
            <div class="ui cards">
                <div class="card">
                    <div class="content">
                        <div class="bandeiras">
                            <div class="time_casa">
                                <img class="ui tiny image" id="imagem_card_casa" src="<?= BASE_URL; ?>/assets/imgs/Times/<?= $game['logo_time_casa']; ?>">
                                <div class="nome_time">
                                    <?= $game['time_casa']; ?>
                                </div>
                            </div>
                            <div class="versus">
                                X
                            </div>
                            <div class="time_fora">
                                <img class="ui tiny image" id="imagem_card_casa" src="<?= BASE_URL; ?>/assets/imgs/Times/<?= $game['logo_time_visitante']; ?>">
                                <div class="nome_time">
                                    <?= $game['time_visitante']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="registar-aposta">
                <a href="<?= BASE_URL ?>bet/new/<?= $game['id']; ?>" class="massive ui red button">
                    APOSTAR<br>AGORA
                </a>
            </div>
        </div>
    </div>
    <div class="ui stackable three column grid">
        <div class="column">
            <div class="container-dados-aposta">
                <button class="huge ui green button">
                    Valor de cada aposta<br>R$ <?= number_format($game['valor'], 2, ",", "."); ?>
                </button>
            </div>
        </div>
        <div class="column">
            <div class="container-dados-aposta">
                <button class="huge ui blue button">
                    Total de Apostas<br>15631
                </button>
            </div>
        </div>
        <div class="column">
            <div class="container-dados-aposta">
                <button class="huge ui orange button">
                    Resultado mais apostado<br>1 x 3
                </button>
            </div>
        </div>
    </div>
    <div class="ui sizer vertical segment" style="border: 0; margin-top: 10px; padding-bottom: 0px;">
        <div class="ui large header" style="border: 0;margin-top: 20px;margin-bottom: 0;padding-bottom: 0;line-height: 10px;">Resultados mais apostados</div>
        <br>
    </div>
    <table class="ui celled table">
        <thead>
        <tr><th>Resultados</th>
            <th>Apostas</th>
        </tr></thead>
        <tbody>
        <tr>
            <td>
                1 x 3
            </td>
            <td>24%</td>
        </tr>
        <tr>
            <td>1 x 1</td>
            <td>20%</td>
        </tr>
        <tr>
            <td>2 x 0</td>
            <td>15%</td>
        </tr>
        <tr>
            <td>0 x 3</td>
            <td>4%</td>
        </tr>
        </tbody>
    </table>
</div>