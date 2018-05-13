const Script = {

    CONTAINER_HEADER: '#header',

    _type: 'on',

    TEMPLATE_HEADER_SEM_LOGIN: '',
    TEMPLATE_HEADER_COM_LOGIN: '',
    TEMPLATE_HEADER_ADMIN: '',
    LOGIN_PAGE: '',
    REGISTER_PAGE: '',
    APOSTAS_PAGE: '',
    CONTA_PAGE: '',

    _loadTemplates: function _loadTemplates(){
        Script.TEMPLATE_HEADER_SEM_LOGIN = 
        '<div class="ui green three inverted menu" id="top-menu">' +
            '<a class="item">Aposte Já</a>' +
            '<div class="right menu">' +
                '<a href="' + Script.LOGIN_PAGE + '" class="item">Login</a>' +
                '<a href="' + Script.REGISTER_PAGE + '" class="item">Registrar</a>' + 
            '</div>' +
        '</div>';
        Script.TEMPLATE_HEADER_COM_LOGIN = 
        '<div class="ui green three inverted menu" id="top-menu">' +
            '<a class="item">Aposte Já</a>' +
            '<div class="right menu">' +
                '<a href="' + Script.APOSTAS_PAGE + '" class="item">Apostas</a>' +
                '<a href="' + Script.CONTA_PAGE + '" class="item">Conta</a>' + 
            '</div>' +
        '</div>';
        Script.TEMPLATE_HEADER_ADMIN = 
        '<div class="ui green three inverted menu" id="top-menu">'+
            '<a class="item">Aposte Já</a>'+
            '<a class="item" id="open-menu"><i class="bars icon"></i></a>'+
            '<div class="right menu">'+
                '<a class="item">Sair</a>'+
            '</div>'+
        '</div>'+
        '<div class="ui left fixed vertical menu" id="left-menu">'+
        '<div class="item">'+
            '<img class="ui mini image" src="assets/images/avatar.png">'+
        '</div>'+
        '<a class="item">Jogos</a>'+
        '<a class="item">Apostas</a>'+
        '<a class="item">Usuários</a>'+
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