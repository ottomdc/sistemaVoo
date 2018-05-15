<?php
    include_once 'conexao3.php';

    function retorna($matricula, $conn){
        $result_aluno = "SELECT * FROM passageiros WHERE idPassageiros = '$matricula' LIMIT 1";
        $resultado_aluno = mysqli_query($conn, $result_aluno);
        if($resultado_aluno->num_rows){
            $row_aluno = mysqli_fetch_assoc($resultado_aluno);
            $valores['pesoPax'] = $row_aluno['peso'];
            $valores['idadePax'] =calcularIdade($row_aluno['data_nascimento']);
            $valores['contatoPax'] = $row_aluno['contato_passageiro'];
        }else{
            $valores['pesoPax'] = '0';
        }
        return json_encode($valores);
    }

    if(isset($_GET['idPassageiros'])){
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

function calculaTempo($hora_inicial, $hora_final){
        $i=1;


        $tempos = array($hora_final,$hora_inicial);

        foreach ($tempos as $tempo){
            $segundos = 0;
            list($h,$m) = explode(':',$tempo);
            $segundos += $h*3600;
            $segundos += $m*60;

            $tempo_total[$i] = $segundos;
            $i++;
        }

        $segundos = $tempo_total[1]-$tempo_total[2];
        $horas = str_pad((floor($segundos/3600)),2, '0', STR_PAD_LEFT);
        $segundos -= $horas*3600;
        $minutos = str_pad((floor($segundos/60)),2,'0', STR_PAD_LEFT);

        return "$horas:$minutos";


}


?>