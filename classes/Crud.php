<?php
include_once('conexao/conexao.php');

$db = new database();

class crud{
    private $conn;
    private $table_name = "carros";

    public function __construct($db){
        $this->conn = $db;
    }
//funcao paraCriar seu registro
public function create($postValues){
    $modelo = $postValues['modelo'];
    $marca = $postValues['marca'];
    $placa = $postValues['placa'];
    $cor = $postValues['cor'];
    $ano = $postValues['ano'];

    $query = "INSERT ". $this->table_name . " (modelo,marca,placa,cor,ano)  values (?,?,?,?,?)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1,$marca);
    $stmt->bindParam(2,$modelo);
    $stmt->bindParam(3,$placa);
    $stmt->bindParam(4,$cor);
    $stmt->bindParam(5,$ano);

    $rows = $this->read();
    if($stmt->execute()){
        print "<script>alert('cadastro ok!')</script>";
        print "<script> location.href='?action=red';</script>";
        return true;
    }else{
        return false;

    }


}

//funcao ler o registro
public function read(){
    $query = "SELECT * FROM " . $this->table_name;
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
}

 //funcao atualizar registros
 public function  update($postValues){
    $modelo = $postValues['modelo'];
    $marca = $postValues['marca'];
    $placa = $postValues['placa'];
    $cor = $postValues['cor'];
    $ano = $postValues['ano'];

    if(empty($id) || empty($marca) || empty($modelo) || empty($placa) || empty($cor) || empty($ano)){
        return false;
    }
    $query = "UPDATE ".$this->table_name . " SET marca = ?, modelo = ?, placa = ?, cor = ?, ano = ? WHERE id = ?";
    $stmt =  $this-> conn->pepare($query);
    $stmt->bindParam(1,$marca);
    $stmt->bindParam(2,$modelo);
    $stmt->bindParam(3,$placa);
    $stmt->bindParam(4,$cor);
    $stmt->bindParam(5,$ano);
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
 }
  // função para registrar o banco e inderir o formulário
  public function readOne($id) {
    $query = "SELECT * FROM ". $this-> table_name . "WHERE id = ?";
    $stmt = $this ->conn->prepare($query);
    $stmt
}

}
?>