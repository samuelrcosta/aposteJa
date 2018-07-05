<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $viewData['title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/css/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/css/admin.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Paaji" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="<?= BASE_URL; ?>assets/js/semantic.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/jquery.mask.min.js"></script>
</head>

<body>
<div id="header">
    <?php if(isset($_SESSION['admin_logged']) && !empty($_SESSION['admin_logged'])): ?>
    <div class="ui green three inverted menu" id="top-menu">
        <a href="<?= BASE_URL; ?>admin" class="item">Aposte Já</a>
        <a class="item" id="open-menu"><i class="bars icon"></i></a>
        <div class="right menu">
            <a href="<?= BASE_URL; ?>admin/logoff" class="item">Sair</a>
            </div>
        </div>
    <div class="ui left fixed vertical menu" id="left-menu">
        <div class="item" style="display: flex;align-items: center;">
            <img class="ui mini image" src="<?= BASE_URL; ?>assets/imgs/avatar.png">
            <div style="margin-left: 10px">Fulano Ciclano</div>
            </div>
        <a href="<?= BASE_URL; ?>adminGames" class="item">Jogos</a>
        <a href="<?= BASE_URL; ?>adminLeagues" class="item">Campeonatos</a>
        <a href="<?= BASE_URL; ?>adminTeams" class="item">Times</a>
        <a href="<?= BASE_URL; ?>adminBets" class="item">Apostas</a>
        <a href="<?= BASE_URL; ?>adminUsers" class="item">Usuários</a>
    </div>
    <?php else: ?>
        <div class="ui green three inverted menu" id="top-menu">
            <a href="<?= BASE_URL; ?>admin" class="item">Aposte Já - Administrador</a>
        </div>
    <?php endif; ?>
</div>
<?php $this->loadViewInTemplate($viewName, $viewData) ?>
<script src="<?= BASE_URL; ?>assets/js/adminScript.js"></script>
</body>
</html>