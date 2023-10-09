<?php 

class Receita
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = Conexao::conexao();      
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

    public function mostrareceita(int $id_categoria)
    {
        $query = $this->pdo->prepare('SELECT * FROM receitas
                                        WHERE 
                                        id_categoria = :id_categoria');

        $query->bindParam(':id_categoria', $id_categoria);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function listar()
    {
        $query = $this->pdo->prepare('SELECT * FROM receitas
                                        ORDER BY rand() LIMIT 6 
                                        ');
        $query->execute();
        
        return $query->fetchALL(PDo::FETCH_OBJ);
    }

    public function nomeCategoria(int $id_categoria)
    {
        $query = $this->pdo->prepare('SELECT * FROM 
                                    receitas
                                    WHERE 
                                    id_categoria = :id_categoria');
        $query->bindParam(':id_categoria',$id_categoria);
        $query->execute();
        $categoria = $query->fetch(PDO::FETCH_OBJ);
        return $categoria->categoria;
    }

}

?>