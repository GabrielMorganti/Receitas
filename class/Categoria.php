<?php 

/**
 * Categoria
 * herda tudo da conexao
 */
class Categoria extends Conexao
{
    
    # ATRIBUTOS	
	public $pdo;
    
    public function __construct()
    {
        $this->pdo = Conexao::conexao();               
    }

    /**
     * listar
     * @return array
     */
    public function listar(){
    	//montar o SELECT ou o SQL
    	$sql = $this->pdo->prepare('SELECT * FROM categorias WHERE excluido = 0 ORDER BY categoria');
    	//executar a consulta
    	$sql->execute();
    	//pegar os dados retornados
    	$dados = $sql->fetchAll(PDO::FETCH_OBJ);
    	return $dados;
    }

    /**
     * cadastrar a categoria
     *
     * @param Array $dados
     * @return int 
     */
    public function cadastrar(Array $dados)
    {
        $sql = $this->pdo->prepare('INSERT INTO categorias 
                                    (categoria)
                                    VALUES
                                    (:categoria)
                                    ');
        //mesclar os dados
        $sql->bindParam(':categoria',$dados['categoria']);
        //executar
        $sql->execute();
        return $this->pdo->lastInsertId();
    }

    
    /**
     * Excluir Categoria
     *
     * @param integer $id_categoria
     * @return void
     */
    public function excluir(int $id_categoria)
    {
        $pdo = $this->pdo->prepare('UPDATE categorias SET 
                                    excluido = 1
                                    WHERE
                                    id_categoria = :id_categoria
                                ');
        $pdo->bindParam(':id_categoria',$id_categoria);
        $pdo->execute();
    }

    /**
     * mostra a categoria
     *
     * @param integer $id_categoria
     * @return object
     */
    public function mostrar(int $id_categoria)
    {
        $sql = $this->pdo->prepare('SELECT * FROM categorias WHERE id_categoria = :id_categoria');
        $sql->bindParam(':id_categoria',$id_categoria);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }

    /** 
     * editar
     *
     * @param array $dados
     * @return int
     */
    public function editar(array $dados)
    {
        if($dados['id_categoria'] != '' && isset($dados['id_categoria']) ){
           
            $sql = $this->pdo->prepare('UPDATE categorias SET 
                                    categoria = :categoria
                                    WHERE 
                                    id_categoria = :id_categoria
                                ');

            $sql->bindParam(':id_categoria',$dados['id_categoria']);
            $sql->bindParam(':categoria',$dados['categoria']);
            $sql->execute();
            return $dados['id_categoria'];
        }
        else
        {
            return false;
        }
    }


}

?>