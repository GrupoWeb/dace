<?php 
    require_once('../../controller/conexion/conexion.php');

    $conn = new Conexion();
    $conexion = $conn->Conectar();

    try {
        $sql = $conexion->prepare("EXEC SP_ALL_CAPACITACION");
        $sql->execute(); 
        $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($resultado as $row) {
            $data['data'][] = $row;
        }
        $sql->closeCursor();
        echo json_encode($data);
    } catch (PDOException $e) {
        
    }


?>