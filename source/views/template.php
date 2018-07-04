<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $viewData['title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/css/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Paaji" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="<?= BASE_URL; ?>assets/js/semantic.min.js"></script>
</head>

<body>
<div id="header">
    <div class="ui green three inverted menu" id="top-menu">
        <a href="<?= BASE_URL; ?>" class="item">Aposte Já</a>
        <div class="right menu">
            <?php if(isset($_SESSION['logged']) && !empty($_SESSION['logged'])): ?>
                <a href="<?= BASE_URL; ?>myBets" class="item">Apostas</a>
                <a href="<?= BASE_URL; ?>myAccount" class="item">Conta</a>
                <a href="<?= BASE_URL; ?>login/logoff" class="item">Sair</a>
            <?php else: ?>
                <a href="<?= BASE_URL; ?>login" class="item">Login</a>
                <a href="<?= BASE_URL; ?>register" class="item">Registrar</a>
            <?php endif; ?>
        </div>
    </div>
</div>
    <?php $this->loadViewInTemplate($viewName, $viewData) ?>
<script src="<?= BASE_URL; ?>assets/js/script.js"></script>
</body>
</html>