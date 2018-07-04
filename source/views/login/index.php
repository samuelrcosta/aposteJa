<link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/css/login.css">
<div class="ui middle aligned center aligned grid">
    <div class="column">
        <h2 class="ui image header">
            <div class="content">
                Faça o Login e comece suas apostas!
            </div>
        </h2>
        <form class="ui large form">
            <div class="ui stacked secondary  segment">
                <div class="field">
                    <div class="ui left icon input">
                        <i class="envelope icon"></i>
                        <input type="text" name="email" placeholder="E-mail" value="jose@gmail.com">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="password" placeholder="Senha" value="12345678">
                    </div>
                </div>
                <div class="ui checkbox">
                    <input type="checkbox" name="checkbox">
                    <label>Manter conectado</label>
                </div>
                <a href="<?= BASE_URL; ?>home/index/logged" class="ui fluid large green submit button">Entrar</a>
                <div>Ainda não possui uma conta?</div>
                <div><a href="<?= BASE_URL; ?>register">Clique aqui</a> e faça o seu cadastro agora!</div>
            </div>
        </form>
    </div>
</div>