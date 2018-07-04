const Script = {

    CONTAINER_HEADER: '#header',

    _type: 'on',

    TEMPLATE_HEADER_SEM_LOGIN: '',
    TEMPLATE_HEADER_COM_LOGIN: '',
    TEMPLATE_HEADER_ADMIN: '',
    LOGIN_PAGE: 'login.html',
    REGISTER_PAGE: 'cadastro.html',
    APOSTAS_PAGE: 'apostas.html',
    CONTA_PAGE: 'minhaconta.html',

    _loadTemplates: function _loadTemplates(){
        Script.TEMPLATE_HEADER_SEM_LOGIN = 
        '<div class="ui green three inverted menu" id="top-menu">' +
            '<a href="index.html" class="item">Aposte Já</a>' +
            '<div class="right menu">' +
                '<a href="' + Script.LOGIN_PAGE + '" class="item">Login</a>' +
                '<a href="' + Script.REGISTER_PAGE + '" class="item">Registrar</a>' + 
            '</div>' +
        '</div>';
        Script.TEMPLATE_HEADER_COM_LOGIN = 
        '<div class="ui green three inverted menu" id="top-menu">' +
            '<a href="index_logado.html" class="item">Aposte Já</a>' +
            '<div class="right menu">' +
                '<a href="' + Script.APOSTAS_PAGE + '" class="item">Apostas</a>' +
                '<a href="' + Script.CONTA_PAGE + '" class="item">Conta</a>' + 
                '<a href="index.html" class="item">Sair</a>' + 
            '</div>' +
        '</div>';
        Script.TEMPLATE_HEADER_ADMIN = 
        '<div class="ui green three inverted menu" id="top-menu">'+
            '<a href="admin.html" class="item">Aposte Já</a>'+
            '<a class="item" id="open-menu"><i class="bars icon"></i></a>'+
            '<div class="right menu">'+
                '<a href="index.html" class="item">Sair</a>'+
            '</div>'+
        '</div>'+
        '<div class="ui left fixed vertical menu" id="left-menu">'+
        '<div class="item" style="display: flex;align-items: center;">'+
            '<img class="ui mini image" src="assets/images/avatar.png">'+
            '<div style="margin-left: 10px">Fulano Ciclano</div>'+
        '</div>'+
        '<a href="admin.html" class="item">Jogos</a>'+
        '<a href="admin_apostas.html" class="item">Apostas</a>'+
        '<a href="usuarios.html" class="item">Usuários</a>'+
        '</div>';
    },


    _listeners: function _listeners(){
       
    },

    _adminMenuListeners: function _adminMenuListeners(){
        $('#open-menu').click(function(){
            if($("#left-menu").hasClass('active')){
                $("#left-menu").removeClass('active').hide();
            }else{
                $("#left-menu").addClass('active').show();
            }
        });
    },

    _createHeader: function _createHeader() {
        if(Script._type == 'off'){
            $(Script.CONTAINER_HEADER).html(Script.TEMPLATE_HEADER_SEM_LOGIN);
        }else if(Script._type == 'on'){
            $(Script.CONTAINER_HEADER).html(Script.TEMPLATE_HEADER_COM_LOGIN);
        }else if(Script._type == 'admin'){
            $(Script.CONTAINER_HEADER).html(Script.TEMPLATE_HEADER_ADMIN);
            // Turn on the button listener
            Script._adminMenuListeners();
        }
    },

    start: function start(type){
        this._type = type;
        // Load templates
        this._loadTemplates();
        // Activate listeners functions
        this._listeners();
        // Creates the header
        this._createHeader();
    }
};