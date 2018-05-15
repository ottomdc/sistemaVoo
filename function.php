<?php
include_once 'conexao.php';



function retorna($matricula, $conn)
{
    $result_aluno = "SELECT * FROM passageiros WHERE idPassageiros = '$matricula' LIMIT 1";
    $resultado_aluno = mysqli_query($conn, $result_aluno);
    if ($resultado_aluno->num_rows) {
        $row_aluno = mysqli_fetch_assoc($resultado_aluno);
        $valores['pesoPax'] = $row_aluno['peso'];
        $valores['idadePax'] = calcularIdade($row_aluno['data_nascimento']);
        $valores['contatoPax'] = $row_aluno['contato_passageiro'];
    } else {
        $valores['pesoPax'] = 'Passageiro Não encontrado';
    }
    return json_encode($valores);
}

    if(isset($_GET['idPassageiros'])) {
        echo retorna($_GET['idPassageiros'], $conn);

    }

function calcularIdade($dataNascimento)
{
    date_default_timezone_set('America/Manaus');
    $date = new DateTime( "$dataNascimento" ); // data e hora de nascimento
    $interval = $date->diff(new DateTime()); // data e hora atual
    $ano =  $interval->format('%Y');
    if($ano > 0){
        return $interval->format( '%Y');
        echo $interval->format( '%Y');
    }else{
        return 0;
    }

}
?>