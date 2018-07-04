<div class="ui container" style="margin-top: 60px;margin-bottom: 60px;">
    <div class="ui large header">Cadastrar Jogo</div>

    <form class="ui form">
        <h4 class="ui dividing header">Data do Jogo</h4>
        <div class="fields">
            <div class="three wide field">
                <label>Dia</label>
                <input type="text" name="diaInput" maxlength="2" placeholder="">
            </div>
            <div class="six wide field">
                <label>Mês</label>
                <div class="two fields">
                    <div class="field">
                        <select class="ui fluid search dropdown" name="mesInput">
                            <option value="01">Janeiro</option>
                            <option value="02">Fevereiro</option>
                            <option value="03">Março</option>
                            <option value="04">Abril</option>
                            <option value="05">Maio</option>
                            <option value="06">Junho</option>
                            <option value="07">Julho</option>
                            <option value="08">Agosto</option>
                            <option value="09">Setembro</option>
                            <option value="10">Outubro</option>
                            <option value="11">Novembro</option>
                            <option value="12">Dezembro</option>
                        </select>
                    </div>
                    <div class="field">
                        <input type="text" name="anoInput" maxlength="4" placeholder="Ano">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <label>Campeonato</label>
            <div class="field">
                <select class="ui fluid search dropdown" name="campeonatoInput">
                    <option value="01">Copa do Mundo</option>
                    <option value="02">Campeonato Brasileiro</option>
                    <option value="03">Champions League</option>
                    <option value="04">Copa do Brasil</option>
                </select>
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label>Time da Casa</label>
                <input type="text" name="time_casa" placeholder="Time da Casa">
            </div>
            <div class="field">
                <label>Time Visitante</label>
                <input type="text" name="time_visitante" placeholder="Time Visitante">
            </div>
        </div>
        <div class="field">
            <label>Local</label>
            <input type="text" name="local" placeholder="Local do jogo...">
        </div>
        <div class="two fields">
            <div class="field">
                <label>Horário</label>
                <input type="text" name="horario" placeholder="Horário">
            </div>
            <div class="field">
                <label>Valor</label>
                <input type="text" name="time_visitante" placeholder="Valor">
            </div>
        </div>
        <a href="<?= BASE_URL ?>adminGames" class="ui fluid large green button" style="margin-top: 20px" tabindex="1">Salvar</a>
    </form>

</div>