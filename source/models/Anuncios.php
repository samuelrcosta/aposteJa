<?php
/**
 * This class retrieves and saves data of the ad.
 *
 * @author  samuelrcosta
 * @version 0.5.0, 25/10/2017
 * @since   0.5
 */
class Anuncios extends model{

    /**
     * This function retrieves all data from an ad, by using it's ID.
     *
     * @param   $id     int for the ad's ID number saved in the database.
     * @return  array containing all data retrieved.
     */
    public function getAnuncio($id){
        $array = array();
        $array['fotos'] = array();
        $sql = "SELECT 
                *, 
                (SELECT categorias.nome FROM categorias WHERE categorias.id = anuncios.id_categoria limit 1) as categoria,
                (SELECT estados.nome FROM estados WHERE estados.id = id_estado limit 1) as nomeEstado,
                (SELECT estados.uf FROM estados WHERE estados.id = id_estado limit 1) as uf,
                (SELECT cidades.nome FROM cidades WHERE cidades.id = id_cidade limit 1) as nomeCidade
                FROM anuncios LEFT JOIN usuarios ON usuarios.id = anuncios.id_usuario WHERE anuncios.id = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($id));
        $sql = $sql->fetch();
        if($sql && count($sql)){
            $array = $sql;
            $sql = $this->db->prepare("SELECT id, url FROM anuncios_imagens WHERE id_anuncio = ?");
            $sql->execute(array($id));
            $sql = $sql->fetchAll();
            if($sql && count($sql)){
                $array['fotos'] = $sql;
            }
        }
        return $array;
    }

    /**
     * This function retrieves all data of a user's ads using his ID
     *
     * @param   $id_usuario     int for the user's ID.
     * @return  array containing all data retrieved.
     */
    public function getMeusAnuncios($id_usuario){
        $sql = "SELECT *, (SELECT anuncios_imagens.url FROM anuncios_imagens WHERE anuncios_imagens.id_anuncio = anuncios.id limit 1) as url FROM anuncios WHERE id_usuario = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($id_usuario));
        return $sql->fetchAll();
    }

    /**
     * This function retrieves all data from ad's into database acording filters, max of results and pages of result.
     *
     * @param   $page       int for the number of the page.
     * @param   $max        int for the maximum number of records
     * @param   $filtros    array for the filters
     * @return  array containing all data retrieved.
     */
    public function getUltimosAnuncios($page, $max, $filtros){
        $offset = ($page - 1) * $max;

        $filtrostring = array('1=1');
        if(!empty($filtros['categoria'])){
            $filtrostring[] = 'anuncios.id_categoria = :id_categoria';
        }
        if(!empty($filtros['precoMin']) && !empty($filtros['precoMax'])){
            $filtrostring[] = 'anuncios.preco BETWEEN :valor1 AND :valor2';
        }else if(!empty($filtros['precoMin'])){
            $filtrostring[] = 'anuncios.preco >= :valor1';
        }else if(!empty($filtros['precoMax'])){
            $filtrostring[] = 'anuncios.preco <= :valor1';
        }
        if(!empty($filtros['estado'])){
            $filtrostring[] = 'anuncios.estado = :estado';
        }
        if(!empty($filtros['estados'])){
            $filtrostring[] = 'id_estado = :ufs';
        }
        if(!empty($filtros['cidades'])){
            $filtrostring[] = 'id_cidade = :cidades';
        }

        $sql = $this->db->prepare("SELECT *,
          anuncios.id as id_anuncio,
          (SELECT anuncios_imagens.url FROM anuncios_imagens WHERE anuncios_imagens.id_anuncio = anuncios.id limit 1) as url,
          (SELECT categorias.nome FROM categorias WHERE categorias.id = anuncios.id_categoria limit 1) as categoria,
          (SELECT estados.nome FROM estados WHERE estados.id = id_estado limit 1) as nomeEstado,
          (SELECT estados.uf FROM estados WHERE estados.id = id_estado limit 1) as uf,
          (SELECT cidades.nome FROM cidades WHERE cidades.id = id_cidade limit 1) as nomeCidade
          FROM anuncios LEFT JOIN usuarios ON usuarios.id = anuncios.id_usuario WHERE ".implode(' AND ', $filtrostring)." ORDER BY             anuncios.id DESC LIMIT ".$offset.", ".$max);

        if(!empty($filtros['categoria'])){
            $sql->bindValue(":id_categoria", $filtros['categoria']);
        }
        if(!empty($filtros['preço'])){
            $preco = explode("-", $filtros['preço']);
            $sql->bindValue(":valor1", $preco[0]);
            $sql->bindValue(":valor2", $preco[1]);
        }
        if(!empty($filtros['precoMin']) && !empty($filtros['precoMax'])){
            $precoMin = str_replace(",", ".", $filtros['precoMin']);
            $precoMax = str_replace(",", ".", $filtros['precoMax']);
            $sql->bindValue(":valor1", $precoMin);
            $sql->bindValue(":valor2", $precoMax);
        }else if(!empty($filtros['precoMin'])){
            $precoMin = str_replace(",", ".", $filtros['precoMin']);
            $sql->bindValue(":valor1", $precoMin);
        }else if(!empty($filtros['precoMax'])){
            $precoMax = str_replace(",", ".", $filtros['precoMax']);
            $sql->bindValue(":valor1", $precoMax);
        }
        if(!empty($filtros['estado'])){
            $sql->bindValue(":estado", $filtros['estado']);
        }
        if(!empty($filtros['estados'])){
            $sql->bindValue(":ufs", $filtros['estados']);
        }
        if(!empty($filtros['cidades'])){
            $sql->bindValue(":cidades", $filtros['cidades']);
        }

        $sql->execute();
        return $sql->fetchAll();
    }

    /**
     * This function retrieves the count of ad's into database acording filters.
     *
     * @param   $filtros    array for the filters
     * @return  int with the value o total ad's.
     */
    public function getTotalAnuncios($filtros){

        $filtrostring = array('1=1');
        if(!empty($filtros['categoria'])){
            $filtrostring[] = 'anuncios.id_categoria = :id_categoria';
        }
        if(!empty($filtros['precoMin']) && !empty($filtros['precoMax'])){
            $filtrostring[] = 'anuncios.preco BETWEEN :valor1 AND :valor2';
        }else if(!empty($filtros['precoMin'])){
            $filtrostring[] = 'anuncios.preco >= :valor1';
        }else if(!empty($filtros['precoMax'])){
            $filtrostring[] = 'anuncios.preco <= :valor1';
        }
        if(!empty($filtros['estado'])){
            $filtrostring[] = 'anuncios.estado = :estado';
        }
        if(!empty($filtros['estados'])){
            $filtrostring[] = 'id_estado = :ufs';
        }
        if(!empty($filtros['cidades'])){
            $filtrostring[] = 'id_cidade = :cidades';
        }

        $sql = $this->db->prepare("SELECT *,
 (SELECT anuncios_imagens.url FROM anuncios_imagens WHERE anuncios_imagens.id_anuncio = anuncios.id limit 1) as url,
  (SELECT categorias.nome FROM categorias WHERE categorias.id = anuncios.id_categoria limit 1) as categoria,
   (SELECT estados.nome FROM estados WHERE estados.id = id_estado limit 1) as nomeEstado,
   (SELECT cidades.nome FROM cidades WHERE cidades.id = id_cidade limit 1) as nomeCidade
	 FROM anuncios LEFT JOIN usuarios ON usuarios.id = anuncios.id_usuario WHERE ".implode(' AND ', $filtrostring)." ORDER BY anuncios.id ");

        if(!empty($filtros['categoria'])){
            $sql->bindValue(":id_categoria", $filtros['categoria']);
        }
        if(!empty($filtros['precoMin']) && !empty($filtros['precoMax'])){
            $precoMin = str_replace(",", ".", $filtros['precoMin']);
            $precoMax = str_replace(",", ".", $filtros['precoMax']);
            $sql->bindValue(":valor1", $precoMin);
            $sql->bindValue(":valor2", $precoMax);
        }else if(!empty($filtros['precoMin'])){
            $precoMin = str_replace(",", ".", $filtros['precoMin']);
            $sql->bindValue(":valor1", $precoMin);
        }else if(!empty($filtros['precoMax'])){
            $precoMax = str_replace(",", ".", $filtros['precoMax']);
            $sql->bindValue(":valor1", $precoMax);
        }
        if(!empty($filtros['estado'])){
            $sql->bindValue(":estado", $filtros['estado']);
        }
        if(!empty($filtros['estados'])){
            $sql->bindValue(":ufs", $filtros['estados']);
        }
        if(!empty($filtros['cidades'])){
            $sql->bindValue(":cidades", $filtros['cidades']);
        }

        $sql->execute();
        return count($sql->fetchAll());
    }

    /**
     * This function retrieves all data from ad's database.
     *
     * @return  array containing all data retrieved.
     */
    public function getAnuncios(){
        $sql = "SELECT * FROM anuncios ORDER BY id DESC";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        $sql = $sql->fetchAll();
        return $sql;
    }

    /**
     * This function register a new ad in database.
     *
     * @param   $id_usuario     int for the ad's id.
     * @param   $titulo         string fot the ad's title.
     * @param   $descricao      string fot the ad's description.
     * @param   $id_categoria   int for the ad's category ID.
     * @param   $preco          double for the ad's price.
     * @param   $estado         int for the ad's conservation status.
     */
    public function cadastrarAnuncio($id_usuario, $titulo, $descricao, $id_categoria, $preco, $estado){
        $sql = "INSERT INTO anuncios (id_usuario, titulo, dataPublicacao, descricao, id_categoria, preco, estado) VALUES (?, ?, CURRENT_TIMESTAMP, ?, ?, ?, ?)";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($id_usuario, $titulo, $descricao, $id_categoria, $preco, $estado));
    }

    /**
     * This function edit a ad in database.
     *
     * @param   $id             int for the ad's ID number saved in the database.
     * @param   $id_usuario     int for the ad's id.
     * @param   $titulo         string fot the ad's title.
     * @param   $descricao      string fot the ad's description.
     * @param   $id_categoria   int for the ad's category ID.
     * @param   $preco          double for the ad's price.
     * @param   $estado         int for the ad's conservation status.
     */
    public function editarAnuncio($id, $id_usuario, $titulo, $descricao, $id_categoria, $preco, $estado){
        $sql = "UPDATE anuncios SET id_usuario = ?, titulo = ?, descricao = ?, id_categoria = ?, preco = ?, estado = ? WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($id_usuario, $titulo, $descricao, $id_categoria, $preco, $estado, $id));
    }

    /**
     * This function delete a ad in database.
     *
     * @param   $id   int for the ad's ID number saved in the database.
     */
    public function excluir($id){
        $sql = $this->db->prepare("DELETE FROM anuncios WHERE id = ?");
        $sql->execute(array($id));
        $sql = $this->db->prepare("SELECT * FROM anuncios_imagens WHERE id = ?");
        $sql->execute(array($id));
        $sql = $sql->fetchAll();
        $a = new Anuncios_imagens();
        foreach($sql as $result){
            $a->excluirFoto($result['id']);
        }

    }
}