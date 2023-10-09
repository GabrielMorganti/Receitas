<?php 

class Receita
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = Conexao::conexao();      
    }

    /**
     * Cadastra uma receita
     * @author Gabriel Morganti 
     *  14/04/2023
     *
     * @param array $_form
     * @param array $arquivo
     * @return int || null
     */
    public function cadastrar(array $form, array $arquivo)
    {
       // Abrir a conexão
       $sql = $this->pdo->prepare(' INSERT INTO receitas 
                                    (id_categoria, titulo, foto, ingredientes, 
                                    modo_fazer, descricao, dt, video)
                                    values
                                    (:id_categoria, :titulo, :foto, :ingredientes, 
                                    :modo_fazer, :descricao, :dt, :video)
       ');  
   
        // Substituir os dados 
        $dt = date('Y-m-d');

        //Subir a imagem
       $imagem = Helper::sobeArquivo($arquivo, '../img/');
       if($imagem){
        $foto = $imagem;
       }else {
        $foto = '';
       }

        $sql->bindParam(':id_categoria',$form['id_categoria']);
        $sql->bindParam(':titulo',$form['titulo']);
        $sql->bindParam(':foto',$foto);
        $sql->bindParam(':ingredientes',$form['ingredientes']);
        $sql->bindParam(':modo_fazer',$form['modo_fazer']);
        $sql->bindParam(':descricao',$form['descricao']);
        $sql->bindParam(':dt',$dt);
        $sql->bindParam(':video',$form['video']);
        
        // Executar a Query
        $sql ->execute();

        // Retornar a Primary Key do registro criado
        return $this->pdo->lastInsertId();

    }

    /**
     * Atualizando uma receita
     * 14-04-2023
     * 
     * @author Gabriel Morganti <email@email.com>
     *
     * @param integer $id_receita
     * @param array $form
     * @return void
     */
    public function editar(int $id_receita, array $form, array $arquivo )
    {
        $query = $this->pdo->prepare('UPDATE receitas SET
                            id_categoria = :id_categoria,
                            titulo = :titulo,
                            foto = :foto,
                            ingredientes = :ingredientes,
                            modo_fazer = :modo_fazer,
                            descricao = :descricao,
                            video     = :video 
                            WHERE
                            id_receita = :id_receita
                        ');

        //Subir a imagem
       $imagem = Helper::sobeArquivo($arquivo, '../img/');
       if($imagem){
        $foto = $imagem;
       }else {
            $foto = $form['foto_atual'];
       }
        $query->bindParam(':id_categoria',$form['id_categoria']);
        $query->bindParam(':titulo',$form['titulo']);
        $query->bindParam(':foto',$foto);
        $query->bindParam(':ingredientes',$form['ingredientes']);
        $query->bindParam(':modo_fazer',$form['modo_fazer']);
        $query->bindParam(':descricao',$form['descricao']);
        $query->bindParam(':id_receita',$id_receita);
        $query->bindParam(':video',$form['video']);

        $query->execute();
    }

    /**
     * Excluir uma receita
     *
     * @param integer $id_receita
     * @return void
     */
    public function excluir(int $id_receita)
    {
        $query = $this->pdo->prepare('UPDATE receitas SET 
                                      excluido = 1  
                                      WHERE
                                      id_receita = :id_receita
                                      ');
        $query->bindParam(':id_receita', $id_receita);

        // Executar
        $query->execute();
    }

    /**
     * Retornar uma receita
     *
     * @param integer $id_receita
     * @return void
     */
    public function mostrar(int $id_receita)
    {
        $query = $this->pdo->prepare('SELECT * FROM receitas
                                        WHERE
                                        id_receita = :id_receita  
                                    ');
        $query->bindParam(':id_receita', $id_receita);
        $query->execute();
        
        // Retornando a receita 
        return $query->fetch(PDo::FETCH_OBJ);
    }

    public function listar()
    {
        $query = $this->pdo->prepare('SELECT * FROM receitas
                                        WHERE excluido = 0
                                        ORDER BY id_receita DESC
                                        ');
        $query->execute();
        
        return $query->fetchALL(PDo::FETCH_OBJ);
    }

    public function nomeCategoria(int $id_categoria)
    {
        $query = $this->pdo->prepare('SELECT categoria 
                                    FROM categorias
                                    WHERE 
                                    id_categoria = :id_categoria');
        $query->bindParam(':id_categoria',$id_categoria);
        $query->execute();
        $categoria = $query->fetch(PDO::FETCH_OBJ);
        return $categoria->categoria;
    }

}

?>