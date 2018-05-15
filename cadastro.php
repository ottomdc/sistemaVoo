<?php
session_start();
ob_start();
$btnSair = filter_input(INPUT_POST, 'btnSair', FILTER_SANITIZE_STRING);
$btnCad = filter_input(INPUT_POST, 'btnCad', FILTER_SANITIZE_STRING);

if($btnSair){
    header("Location: login_sistema_voo.php");
}

if(!empty($_SESSION['id'])){
    if($btnCad){
        include_once 'conexao.php';
        $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
        // $dados_st = array_map('strip_tags', $dados_rc);
        //$dados = array_map('trim', $dados_st);
        var_dump($dados);
        $sql = "INSERT INTO planejamento_voo ('data_voo', 'aeronave', 'piloto', 'copiloto', 'origem', 'destino', 'distancia', 'nivel', 'rumo', 'pob', 'pax', 'alternativa', 'acionamento', 'decolagem', 'tacInicial', 'pouso', 'corte', 'tacFinal', 'tempoVoo', 'combDecolagem', 'combPouso', 'comUtilizado', 'autonomia', 'pesoCombustivel', 'consumoReal', 'vi', 'va', 'vs', 'oat', 'n1', 'egt', 'hp', 'torque', 'fuelFlow', 'fuelPress', 'oilPress', 'oilTemp', 'horarioParametros', 'pesoTotal', 'pax1', 'pax2', 'pax3', 'pax4', 'pax5', 'pax6', 'pax7') 
  VALUES ('".$dados['data']."',
          '".$dados['aeronave']."',
          '".$dados['piloto']."',
          '".$dados['copiloto']."',
          '".$dados['origem']."',
          '".$dados['destino']."',
          '".$dados['distancia']."',
          '".$dados['nivel']."',
          '".$dados['rumo']."',
          '".$dados['pob']."',
          '".$dados['pax']."',
          '".$dados['alternativa']."',
          '".$dados['acionamento']."',
          '".$dados['decolagem']."',
          '".$dados['tacInicial']."',
          '".$dados['pouso']."',
          '".$dados['corte']."',
          '".$dados['tacFinal']."',
          '".$dados['tempoVoo']."',
          '".$dados['combDecolagem']."',
          '".$dados['combPouso']."',
          '".$dados['combUtilizado']."',
          '".$dados['autonomia']."',
          '".$dados['pesoComb']."',
          '".$dados['consReal']."',
          '".$dados['vi']."',
          '".$dados['va']."',
          '".$dados['vs']."',
          '".$dados['oat']."',
          '".$dados['n1']."',
          '".$dados['egt']."',
          '".$dados['hp']."',
          '".$dados['torque']."',
          '".$dados['fuelFlow']."',
          '".$dados['fuelPress']."',
          '".$dados['oilPress']."',
          '".$dados['oilTemp']."',
          '".$dados['horarioParametros']."',
          '".$dados['pesoTotal']."',
          '".$dados['nomePax1']."',
          '".$dados['nomePax2']."',
          '".$dados['nomePax3']."',
          '".$dados['nomePax4']."',
          '".$dados['nomePax5']."',
          '".$dados['nomePax6']."',
          '".$dados['nomePax7']."'
          )";

        $resultado = mysqli_query($conn,$sql);
        if(mysqli_insert_id($conn)){
            $_SESSION['msgcad'] = "<div class='alert alert-success'>Planejamento Salvo Com Sucesso!</div>";
            header("Location: administrativo.php");
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao cadastrar o planejamento!</div>";
            header("Location: administrativo.php");
        }
    }
}else{
    $_SESSION['msg'] = "<div class='alert alert-danger'>Área restrita!</div>";
    header("Location: login_sistema_voo.php");
}
?>