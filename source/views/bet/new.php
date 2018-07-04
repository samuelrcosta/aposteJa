<link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/css/detalhe_jogo.css">
<div class="ui container" style="margin-top: 60px;margin-bottom: 60px;">
    <div class="ui large header">Registrar uma aposta</div>
    <p>Preencha os campos com os resultados desejados e a quantidade de apostas</p>

    <div class="placar-aposta-container">
        <div class="bandeiras">
            <div class="time">
                <img class="ui tiny image" id="imagem_card_casa" src="<?= BASE_URL; ?>/assets/imgs/bandeira_brasil.PNG">
                <div class="nome_time">
                    Brasil
                </div>
            </div>
            <div class="versus">
                <div class="ui input">
                    <input type="number">
                </div>
                <span>X</span>
                <div class="ui input">
                    <input type="number">
                </div>
            </div>
            <div class="time">
                <img class="ui tiny image" id="imagem_card_casa" src="<?= BASE_URL; ?>/assets/imgs/bandeira_suica.jpg">
                <div class="nome_time">
                    Suíça
                </div>
            </div>
        </div>
    </div>

    <div class="quantidade-aposta-container">
        <p>Apostar</p>
        <div class="ui input">
            <input type="number" id="quantidade-apostas" value="1">
        </div>
        <div class="resultado-calculo">
            <div class="valor">
                x R$ 15,00
            </div>
            <div class="total">
                TOTAL: R$ <span>15,00</span>
            </div>
        </div>
    </div>

    <div style="text-align: center; margin-top: 30px;">
        <a href="<?= BASE_URL; ?>game/open/id" class="positive ui button">Registar Aposta</a>
    </div>

</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#quantidade-apostas").keyup(function(){
            let qnt = $(this).val();
            if(qnt < 0){
                $(this).val(1);
            }else{
                let total = qnt * 15;

                $(".total").find("span").html(total.toFixed(2));
            }
        });
    });
</script>