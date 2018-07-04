<?php
declare(strict_types=1);

include_once __DIR__.'/../../core/model.php';
include_once __DIR__.'/../../models/Anuncios.php';

final class AnunciosTest extends PHPUnit_Extensions_Database_TestCase{

    private $conn = null;

    public function testGetAnuncio(){
        $conn = $this->getConnection()->getConnection();

        $GLOBALS['db'] = $conn;

        $a = new Anuncios();
        $result = $a->getAnuncio(1);
        $this->assertEquals(1, $result['id']);
        $this->assertEquals(1, $result['id_usuario']);
        $this->assertEquals('Teste Titulo', $result['titulo']);
        $this->assertEquals('2017-10-25 19:30:00', $result['dataPublicacao']);
        $this->assertEquals('Descrição do Anúncio', $result['descricao']);
        $this->assertEquals('1', $result['id_categoria']);
        $this->assertEquals(100.50, $result['preco']);
        $this->assertEquals('1', $result['estado']);
        $this->assertEquals('Carros', $result['categoria']);
        $this->assertEquals('Administrador', $result['nome']);
        $this->assertEquals('(62) 3232-3232', $result['telefone']);
        $this->assertEquals('(62) 98585-8585', $result['celular']);
        $this->assertEquals('adm@adm.com.br', $result['email']);
        $this->assertEquals(1, $result['fotos'][0]['id']);
        $this->assertEquals('imagem_anuncio', $result['fotos'][0]['url']);
    }

    public function testGetMeusAnuncios(){
        $conn = $this->getConnection()->getConnection();

        $GLOBALS['db'] = $conn;

        $a = new Anuncios();
        $result = $a->getMeusAnuncios(1);
        $this->assertEquals(1, $result[0]['id']);
        $this->assertEquals(1, $result[0]['id_usuario']);
        $this->assertEquals("imagem_anuncio", $result[0]['url']);
        $this->assertEquals('Teste Titulo', $result[0]['titulo']);
        $this->assertEquals('2017-10-25 19:30:00', $result[0]['dataPublicacao']);
        $this->assertEquals('Descrição do Anúncio', $result[0]['descricao']);
        $this->assertEquals('1', $result[0]['id_categoria']);
        $this->assertEquals(100.50, $result[0]['preco']);
        $this->assertEquals('1', $result[0]['estado']);
    }

    public function testGetTotalAnuncios(){
        $conn = $this->getConnection()->getConnection();

        $GLOBALS['db'] = $conn;

        $a = new Anuncios();
        $filtros = array(
            'categoria' => '1',
            'preço' => '50-200',
            'estado' => '1',
            'estados' => '1',
            'cidades' => '1'
        );
        $result = $a->getTotalAnuncios($filtros);
        $this->assertEquals(1, $result);

        //Teste do primeiro else if
        $filtros = array(
            'categoria' => '1',
            'precoMin' => '50,00',
            'precoMax' => '',
            'estado' => '1',
            'estados' => '1',
            'cidades' => '1'
        );
        $result = $a->getTotalAnuncios($filtros);
        $this->assertEquals(1, $result);

        //Teste do segundo else if
        $filtros = array(
            'categoria' => '1',
            'precoMin' => '',
            'precoMax' => '250,00',
            'estado' => '1',
            'estados' => '1',
            'cidades' => '1'
        );
        $result = $a->getTotalAnuncios($filtros);
        $this->assertEquals(1, $result);
    }

    public function testGetUltimosAnuncios(){
        $conn = $this->getConnection()->getConnection();

        $GLOBALS['db'] = $conn;

        $a = new Anuncios();
        $page = 1;
        $max = 30;
        $filtros = array(
            'categoria' => '1',
            'precoMin' => '50,00',
            'precoMax' => '250,00',
            'estado' => '1',
            'estados' => '1',
            'cidades' => '1'
        );
        $result = $a->getUltimosAnuncios($page, $max, $filtros);
        $this->assertEquals(1, $result[0]['id']);
        $this->assertEquals(1, $result[0]['id_usuario']);
        $this->assertEquals("imagem_anuncio", $result[0]['url']);
        $this->assertEquals('Teste Titulo', $result[0]['titulo']);
        $this->assertEquals('2017-10-25 19:30:00', $result[0]['dataPublicacao']);
        $this->assertEquals('Descrição do Anúncio', $result[0]['descricao']);
        $this->assertEquals('1', $result[0]['id_categoria']);
        $this->assertEquals(100.50, $result[0]['preco']);
        $this->assertEquals('1', $result[0]['estado']);

        //Teste do primeiro else if
        $filtros = array(
            'categoria' => '1',
            'precoMin' => '50,00',
            'precoMax' => '',
            'estado' => '1',
            'estados' => '1',
            'cidades' => '1'
        );
        $result = $a->getUltimosAnuncios($page, $max, $filtros);
        $this->assertEquals(1, $result[0]['id']);
        $this->assertEquals(1, $result[0]['id_usuario']);
        $this->assertEquals("imagem_anuncio", $result[0]['url']);
        $this->assertEquals('Teste Titulo', $result[0]['titulo']);
        $this->assertEquals('2017-10-25 19:30:00', $result[0]['dataPublicacao']);
        $this->assertEquals('Descrição do Anúncio', $result[0]['descricao']);
        $this->assertEquals('1', $result[0]['id_categoria']);
        $this->assertEquals(100.50, $result[0]['preco']);
        $this->assertEquals('1', $result[0]['estado']);

        //Teste do segundo else if
        $filtros = array(
            'categoria' => '1',
            'precoMin' => '',
            'precoMax' => '250,00',
            'estado' => '1',
            'estados' => '1',
            'cidades' => '1'
        );
        $result = $a->getUltimosAnuncios($page, $max, $filtros);
        $this->assertEquals(1, $result[0]['id']);
        $this->assertEquals(1, $result[0]['id_usuario']);
        $this->assertEquals("imagem_anuncio", $result[0]['url']);
        $this->assertEquals('Teste Titulo', $result[0]['titulo']);
        $this->assertEquals('2017-10-25 19:30:00', $result[0]['dataPublicacao']);
        $this->assertEquals('Descrição do Anúncio', $result[0]['descricao']);
        $this->assertEquals('1', $result[0]['id_categoria']);
        $this->assertEquals(100.50, $result[0]['preco']);
        $this->assertEquals('1', $result[0]['estado']);
    }

    public function testGetAnuncios(){
        $conn = $this->getConnection()->getConnection();

        $GLOBALS['db'] = $conn;

        $a = new Anuncios();
        $result = $a->getAnuncios();
        $this->assertEquals(1, $result[1]['id']);
        $this->assertEquals(1, $result[1]['id_usuario']);
        $this->assertEquals('Teste Titulo', $result[1]['titulo']);
        $this->assertEquals('2017-10-25 19:30:00', $result[1]['dataPublicacao']);
        $this->assertEquals('Descrição do Anúncio', $result[1]['descricao']);
        $this->assertEquals('1', $result[1]['id_categoria']);
        $this->assertEquals(100.50, $result[1]['preco']);
        $this->assertEquals('1', $result[1]['estado']);
        $this->assertEquals(2, $result[0]['id']);
        $this->assertEquals(2, $result[0]['id_usuario']);
        $this->assertEquals('Teste Titulo 2', $result[0]['titulo']);
        $this->assertEquals('2017-10-23 19:30:00', $result[0]['dataPublicacao']);
        $this->assertEquals('Descr Anc', $result[0]['descricao']);
        $this->assertEquals('3', $result[0]['id_categoria']);
        $this->assertEquals(55.12, $result[0]['preco']);
        $this->assertEquals('3', $result[0]['estado']);
    }

    public function testCadastrarAnuncio(){
        $conn = $this->getConnection()->getConnection();

        $GLOBALS['db'] = $conn;

        $a = new Anuncios();
        $_SESSION['cLogin'] = 3;

        $a->cadastrarAnuncio(3, 'Carro Automático', 'Ótimo estado de conservação', '2', 30.00, '2');

        $sql = "SELECT * FROM anuncios ORDER BY id desc";
        $sql = $GLOBALS['db']->prepare($sql);
        $sql->execute();
        $result = $sql->fetch();

        $this->assertEquals(3, $result['id']);
        $this->assertEquals(3, $result['id_usuario']);
        $this->assertEquals('Carro Automático', $result['titulo']);
        $this->assertEquals('Ótimo estado de conservação', $result['descricao']);
        $this->assertEquals('2', $result['id_categoria']);
        $this->assertEquals(30.00, $result['preco']);
        $this->assertEquals('2', $result['estado']);
    }

    public function testEditarAnuncio(){
        $conn = $this->getConnection()->getConnection();

        $GLOBALS['db'] = $conn;

        $a = new Anuncios();
        $_SESSION['cLogin'] = 3;

        $a->editarAnuncio(1, 3, 'Carro Automático', 'Ótimo estado de conservação', '2', 115.66, '2');

        $sql = "SELECT * FROM anuncios WHERE id = ?";
        $sql = $GLOBALS['db']->prepare($sql);
        $sql->execute(array(1));
        $result = $sql->fetch();

        $this->assertEquals(1, $result['id']);
        $this->assertEquals(3, $result['id_usuario']);
        $this->assertEquals('Carro Automático', $result['titulo']);
        $this->assertEquals('2017-10-25 19:30:00', $result['dataPublicacao']);
        $this->assertEquals('Ótimo estado de conservação', $result['descricao']);
        $this->assertEquals('2', $result['id_categoria']);
        $this->assertEquals(115.66, $result['preco']);
        $this->assertEquals('2', $result['estado']);
    }

    public function testExcluir(){
        $conn = $this->getConnection()->getConnection();

        $GLOBALS['db'] = $conn;

        $a = new Anuncios();
        $id = 1;
        $a->excluir($id);
        $sql = "SELECT * FROM anuncios WHERE id = ?";
        $sql = $GLOBALS['db']->prepare($sql);
        $sql->execute(array($id));
        $result = $sql->fetch();
        $this->assertEmpty($result);
    }

    /**
     * @coversNothing
     */
    public function getConnection()
    {
        if(!$this->conn) {

            $db = new PDO('sqlite::classi-o:');
            $db->exec('CREATE TABLE `anuncios` (`id` INTEGER PRIMARY KEY AUTOINCREMENT, `id_usuario` INTEGER NOT NULL, `titulo` varchar(150) NOT NULL, `dataPublicacao` DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, `descricao` text, `id_categoria` int(11) NOT NULL, `preco` double NOT NULL, `estado` INTEGER NOT NULL); CREATE TABLE `anuncios_imagens` (`id` INTEGER PRIMARY KEY AUTOINCREMENT, `id_anuncio` INTEGER NOT NULL, `url` varchar(150) NOT NULL); CREATE TABLE `usuarios` (`id` INTEGER PRIMARY KEY AUTOINCREMENT, `nome` varchar(150) NOT NULL, `email` varchar(150) NOT NULL, `senha` varchar(200) NOT NULL, `telefone` varchar(20) NOT NULL, `celular` varchar(20), `id_estado` int(11) NOT NULL, `id_cidade` int(11) NOT NULL, `hashRecuperacao` varchar(200)); CREATE TABLE `categorias` (`id` INTEGER PRIMARY KEY AUTOINCREMENT, `nome` varchar(150) NOT NULL);CREATE TABLE `cidades` (`id` INTEGER PRIMARY KEY AUTOINCREMENT, `nome` varchar(150) NOT NULL, `id_estado` int(11) NOT NULL); CREATE TABLE `estados` (`id` INTEGER PRIMARY KEY AUTOINCREMENT, `nome` varchar(150) NOT NULL, `uf` varchar(3) NOT NULL)');
            $this->conn =  $this->createDefaultDBConnection($db, ':classi-o:');
        }

        return $this->conn;
    }

    /**
     * @coversNothing
     */
    public function getDataSet()
    {
        return $this->createXMLDataSet(__DIR__."/Classi-O.xml");
    }
}
?>
