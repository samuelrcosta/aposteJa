<div class="ui container" style="margin-top: 60px;margin-bottom: 60px;">
    <div class="ui large header">Novo Jogo</div>

    <form class="ui form" method="POST">
        <h4 class="ui dividing header">Data do Jogo</h4>
        <div class="fields">
            <div class="six wide field">
                <input type="text" required name="data" id="data"  placeholder="dd/mm/yyyy hh:mm"">
            </div>
        </div>
        <div class="field">
            <label>Campeonato</label>
            <div class="field">
                <select class="ui fluid search dropdown" required name="campeonato" id="campeonato">
                    <?php foreach ($leagues as $l):?>
                        <option value="<?= $l['id'] ?>"><?= $l['nome'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label>Time da Casa</label>
                <select class="ui fluid search dropdown" required name="time_casa" id="time_casa">
                    <?php foreach ($times as $t):?>
                        <option value="<?= $t['id'] ?>"><?= $t['nome'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="field">
                <label>Time Visitante</label>
                <select class="ui fluid search dropdown" required name="time_visitante" id="time_visitante">
                    <?php foreach ($times as $t):?>
                        <option value="<?= $t['id'] ?>"><?= $t['nome'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="field">
            <label>Local</label>
            <input type="text" name="local" placeholder="Local do jogo..." ">
        </div>
        <div class="fields">
            <div class="field">
                <label>Valor</label>
                <input type="text" required name="valor" id="valor" placeholder="Valor">
            </div>
        </div>
        <div class="ui segment">
            <div class="field">
                <div class="ui toggle checkbox">
                    <input type="checkbox" name="popular" tabindex="0" class="hidden" >
                    <label>Jogo Popular</label>
                </div>
            </div>
        </div>
        <input type="submit" value="Salvar" class="ui fluid large green button" style="margin-top: 20px" tabindex="1">
    </form>
    <script>
        $(document).ready(function(){
            $("#data").mask('00/00/0000 00:00');
            $('#valor').mask("#.##0,00", {reverse: true});
            $('.ui.checkbox').checkbox("toggle");
        });
    </script>