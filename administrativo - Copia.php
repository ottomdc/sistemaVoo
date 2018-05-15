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
        $dados_rc = filter_input_array(INPUT_POST,FILTER_DEFAULT);
        $dados_st = array_map('strip_tags', $dados_rc);
        $dados = array_map('trim', $dados_st);

        $sql = "INSERT INTO planejamento_voo ('data_voo', 'aeronave', 'piloto', 'copiloto', 'origem', 'destino', 'distancia', 'nivel', 'rumo', 'pob', 'pax', 'alternativa', 'acionamento', 'decolagem', 'tacInicial', 'pouso', 'corte', 'tacFinal', 'tempoVoo', 'combDecolagem', 'combPouso', 'comUtilizado', 'autonomia', 'pesoCombustivel', 'consumoReal', 'vi', 'va', 'vs', 'oat', 'n1', 'egt', 'hp', 'torque', 'fuelFlow', 'fuelPress', 'oilPress', 'oilTemp', 'horarioParametros', 'pesoTotal', 'pax1', 'pax2', 'pax3', 'pax4', 'pax5', 'pax6', 'pax7') 
  VALUES ('".$dados['']."')";
    }
}else{
    $_SESSION['msg'] = "<div class='alert alert-danger'>Área restrita!</div>";
    header("Location: login_sistema_voo.php");
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Coordenação de Voo</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap2.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>

</head>

<body>





<form method="POST" action="">
    <div class="text-center mb-4">
        <img class="mb-4" src="img/logo/logo.png" alt="" width="250" height="100">
        <h1 class="h3 mb-3 font-weight-normal">Coordenação de Voo</h1>

        <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        if(isset($_SESSION['msgcad'])){
            echo $_SESSION['msgcad'];
            unset($_SESSION['msgcad']);
        }
        ?>

        <div class="container">
            <div class="row">
                <div class="col-md-12 table-responsive">
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <!--PLANEJAMENTO DE VOO-->
                            <tr>
                                <thead>
                                <th colspan="6" class="text-center"><h3>PLANEJAMENTO DE VOO</h3></th>
                               </thead>
                            </tr>
                            <tr>
                                <td>
                                    <label for="data" class="form-control">DATA:</label>
                                </td>
                                <td>
                                    <input type="text"  placeholder="dd/mm/aaaa" class="form-control" id="data" name="data">
                                </td>
                                <td>
                                    <label for="aeronave" class="form-control">AERONAVE:</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" placeholder="PR-ZJM" VALUE="PR-ZJM" id="aeronave" name="aeronave">
                                </td>
                                <td>
                                    <label for="piloto" class="form-control">PILOTO:</label>
                                </td>
                                <td>
                                    <select class="custom-select" name="piloto">
                                        <option value="Márcio Rempel">Márcio Rempel</option>
                                        <option value="Albert Otto">Albert Otto</option>
                                        <option value="Airton Silva">Airton Silva</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="origem" class="form-control">ORIGEM:</label>
                                </td>
                                <td>
                                    <input type="text"  placeholder="SWFN" class="form-control" id="origem" name="origem">
                                </td>
                                <td>
                                    <label for="destino" class="form-control">DESTINO:</label>
                                </td><td><input class="form-control" type="text" placeholder="SWFN" id="destino" name="destino">
                                </td>
                                <td>
                                    <label for="copiloto" class="form-control">COPILOTO:</label>
                                </td>
                                <td>
                                    <select class="custom-select">
                                        <option value="">Copiloto</option>
                                        <option value="Márcio Rempel">Márcio Rempel</option>
                                        <option value="Albert Otto">Albert Otto</option>
                                        <option value="Airton Silva">Airton Silva</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="data" class="form-control">DISTANCIA:</label>
                                </td><td><input type="text"  placeholder="distância em mn" class="form-control" id="distancia" name="distancia">
                                </td>
                                <td>
                                    <label for="nivel" class="form-control">NIVEL:</label>
                                </td>
                                <td>
                                    <select id="nivel" name="nivel" class="custom-select" onblur="calculo3()" ">
                                        <option value="">FL</option>
                                        <option value="FL035">FL035</option>
                                        <option value="FL045">FL045</option>
                                        <option value="FL055">FL055</option>
                                        <option value="FL065">FL065</option>
                                        <option value="FL075">FL075</option>
                                        <option value="FL085">FL085</option>
                                        <option value="FL095">FL095</option>
                                        <option value="FL100">FL100</option>
                                        <option value="FL105">FL105</option>
                                        <option value="FL110">FL110</option>
                                        <option value="FL115">FL115</option>
                                        <option value="FL120">FL120</option>
                                        <option value="FL125">FL125</option>
                                        <option value="FL130">FL130</option>
                                    </select>
                                </td>
                                <td>
                                    <label for="rumo" class="form-control">RUMO:</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" placeholder="rumo magnetico pretendido"  id="rumo" name="rumo">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="pob" class="form-control">POB:</label>
                                </td>
                                <td>
                                    <input type="text"  placeholder="qtde de pessoas a bordo" class="form-control" id="pob" name="pob">
                                </td>
                                <td>
                                    <label for="pax" class="form-control">PAX:</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" placeholder="qtde de passageiros" id="pax" name="pax">
                                </td>
                                <td>
                                    <label for="alternativa" class="form-control">ALTERNATIVA:</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" placeholder="Aerodromo de alternativa"  id="alternativa" name="alternativa">
                                </td>
                            </tr>

                            <!--TEMPOS-->
                            <tr>
                                <thead>
                                <th colspan="6" class="text-center"><h3>TEMPOS</h3></th>
                                </thead>
                            </tr>
                            <tr>
                                <td>
                                    <label for="acionamento" class="form-control">ACIONAMENTO:</label>
                                </td>
                                <td>
                                    <input type="text"  placeholder="hora utc" class="form-control" id="acionamento" name="acionamento">
                                </td>
                                <td>
                                    <label for="decolagem" class="form-control">DECOLAGEM:</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" placeholder="hora utc" id="decolagem" name="decolagem">
                                </td>
                                <td>
                                    <label for="pouso" class="form-control">POUSO:</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" placeholder="hora utc" id="pouso" name="pouso">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="corte" class="form-control">CORTE:</label>
                                </td>
                                <td>
                                    <input type="text"  placeholder="hora utc" class="form-control" id="corte" name="corte">
                                </td>
                                <td>
                                    <label for="tempoVoo" class="form-control">TEMPO DE VOO:</label>
                                </td>
                                    <td>
                                        <input class="form-control" type="text" placeholder="hora utc" id="tempoVoo" name="tempoVoo">
                                    </td>
                                <td>
                                    <label for="etaDest" class="form-control">ETA DESTINO:</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" placeholder="Tempo estimado destino" id="etaDest" name="etaDest">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="data" class="form-control">ETA TMA:</label>
                                </td>
                                <td>
                                    <input type="text"  placeholder="distância em mn" class="form-control" id="distancia" name="distancia">
                                </td>
                                <td>
                                    <label for="tacInicial" class="form-control">TAC./HOR. INIC:</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" placeholder="horimetro no acionamento"  id="tacInicial" name="tacInicial">
                                </td>
                                <td>
                                    <label for="tacFinal" class="form-control">TAC./HOR.FINAL:</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" placeholder="horimetro no corte"  id="tacFinal" name="tacFinal">
                                </td>
                            </tr>


                            <!--COMBUSTIVEL-->
                            <tr>
                                <thead>
                                <th colspan="6" class="text-center"><h3>COMBUSTÍVEL</h3></th>
                                </thead>
                            </tr>
                            <tr>
                                <td>
                                    <label for="combDecolagem" class="form-control">COMB. DECOLAGEM:</label>
                                </td>
                                <td>
                                    <input type="text"  placeholder="Comb. em Litros" class="form-control" id="combDecolagem"
                                           name="combDecolagem" onblur="calculo()">
                                </td>
                                <td>
                                    <label for="combPouso" class="form-control">COMB. POUSO:</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" placeholder="Comb. em Litros" id="combPouso"
                                           name="combPouso" onblur="calculo2()">
                                </td>
                                <td>
                                    <label for="combUtilizado" class="form-control">COMB. UTILIZADO:</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" placeholder="Comb. em Litros" id="combUtilizado" name="combUtilizado">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="autonomia" class="form-control">AUTONOMIA:</label>
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="autonomia" name="autonomia">
                                </td>
                                <td>
                                    <label for="pesoComb" class="form-control">PESO COMB.:</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" id="pesoComb" name="pesoComb">
                                </td>
                                <td>
                                    <label for="consReal" class="form-control">CONS. REAL:</label>
                                </td>
                                <td>
                                    <input class="form-control" placeholder="consumo real do trecho" type="text" id="consReal" name="consReal">
                                </td>
                            </tr>



                            <!--COMUNICAÇÃO-->
                            <tr>
                                <thead>
                                <th colspan="6" class="text-center"><h3>COMUNICAÇÃO</h3></th>
                                </thead>
                            </tr>
                            <tr>
                                <td>
                                    <label for="torre" class="form-control">TORRE:</label>
                                </td>
                                <td>
                                    <input type="text"  class="form-control" id="torre" name="torre" onblur="calculo()">
                                </td>
                                <td>
                                    <label for="app" class="form-control">APP:</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" id="app"  name="app">
                                </td>
                                <td>
                                    <label for="afis" class="form-control">AFIS:</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" id="afis" name="afis">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="atis" class="form-control">ATIS:</label>
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="atis" name="atis">
                                </td>
                                <td>
                                    <label for="acc" class="form-control">ACC:</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" id="acc" name="acc">
                                </td>
                                <td colspan="2"></td>
                            </tr>





                            <!--PARAMETROS DE VOO-->
                            <tr>
                                <thead>
                                <th colspan="6" class="text-center"><h3>PARAMETROS DE VOO</h3></th>
                                </thead>
                            </tr>
                            <tr>
                            <td>
                                <label for="fl" class="form-control">FL:</label>
                            </td>
                            <td>
                                <input type="text"  class="form-control" id="fl" name="fl">
                            </td>
                            <td>
                                <label for="n1" class="form-control">N1%:</label>
                            </td>
                            <td>
                                <input class="form-control" type="text" id="n1"  name="n1">
                            </td>
                            <td>
                                <label for="fuelPress" class="form-control">FUEL PRESS:</label>
                            </td>
                            <td>
                                <input class="form-control" type="text" id="fuelPress" name="fuelPress">
                            </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="vi" class="form-control">VI:</label>
                                </td>
                                <td>
                                    <input type="text"  class="form-control" id="vi" name="vi">
                                </td>
                                <td>
                                    <label for="egt" class="form-control">EGT:</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" id="egt"  name="egt">
                                </td>
                                <td>
                                    <label for="oilPress" class="form-control">OIL PRESS:</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" id="oilPress" name="oilPress">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="va" class="form-control">VA:</label>
                                </td>
                                <td>
                                    <input type="text"  class="form-control" id="va" name="va">
                                </td>
                                <td>
                                    <label for="hp" class="form-control">%HP:</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" id="hp"  name="hp">
                                </td>
                                <td>
                                    <label for="oilTemp" class="form-control">OIL TEMP:</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" id="oilTemp" name="oilTemp">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="vs" class="form-control">VS:</label>
                                </td>
                                <td>
                                    <input type="text"  class="form-control" id="vs" name="vs">
                                </td>
                                <td>
                                    <label for="torque" class="form-control">%TORQUE:</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" id="torque"  name="torque">
                                </td>
                                <td>
                                    <label for="horario" class="form-control">HORÁRIO:</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" id="horario" name="horario">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="oat" class="form-control">OAT:</label>
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="oat" name="oat">
                                </td>
                                <td>
                                    <label for="fuelFlow" class="form-control">FUEL FLOW:</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" id="fuelFlow" name="fuelFlow">
                                </td>
                                <td colspan="2"></td>
                            </tr>



                            <!--PESO E BALANCEAMENTO-->
                            <tr>
                                <thead>
                                <th colspan="6" class="text-center"><h3>PESO E BALANCEAMENTO</h3></th>
                                </thead>
                            </tr>
                            <tr class="text-center">
                                <td>
                                    <label><h6>Carga util: 1460KG</h6></label>
                                </td>
                                <td>
                                    <label><h6>Peso (KG)</h6></label>
                                </td>
                                <td>
                                    <label><h6>Braço (m)</h6></label>
                                </td>
                                <td>
                                    <label><h6>Momento</h6></label>
                                </td>
                                <td colspan="2">
                                    <label><h6>Calculo CG</h6></label>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="pesoVazio" class="form-control">VAZIO:</label>
                                </td>
                                <td>
                                    <input type="number"  class="form-control text-center" id="pesoVazio" name="pesoVazio" value="2430" disabled>
                                </td>
                                <td>
                                    <input type="number"  class="form-control text-center" id="bracoVazio" name="bracoVazio" value="2.31" disabled>
                                </td>
                                <td>
                                    <input type="number"  class="form-control text-center" id="momentoVazio" name="momentoVazio" value="5613.3" disabled>
                                </td>
                                <td colspan="2" rowspan="9">

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="pesoTripulacao" class="form-control">TRIPULAÇÃO:</label>
                                </td>
                                <td>
                                    <input type="number" value="210"  class="form-control text-center" id="pesoTripulacao" name="pesoTripulacao" onblur="calculoMomentoPilotos()">
                                </td>
                                <td>
                                    <input type="number"  class="form-control text-center" id="bracoTripulacao" name="bracoTripulacao" value="1.4" disabled>
                                </td>
                                <td>
                                    <input type="number"  class="form-control text-center" id="momentoTripulacao" name="momentoTripulacao" disabled>
                                </td>

                            </tr>

                            <tr>
                                <td>
                                    <label for="pesoFila1" class="form-control">FILA 1:</label>
                                </td>
                                <td>
                                    <input type="number" class="form-control text-center" id="pesoFila1" name="pesoFila1" disabled>
                                </td>
                                <td>
                                    <input type="number"  class="form-control text-center" id="bracoFila1" name="bracoFila1" value="2.23" disabled>
                                </td>
                                <td>
                                    <input type="number"  class="form-control text-center" id="momentoFila1" name="momentoFila1" disabled>
                                </td>

                            </tr>

                            <tr>
                                <td>
                                    <label for="pesoFila2" class="form-control">FILA 2:</label>
                                </td>
                                <td>
                                    <input type="number" class="form-control text-center" id="pesoFila2" name="pesoFila2" disabled>
                                </td>
                                <td>
                                    <input type="number"  class="form-control text-center" id="bracoFila2" name="bracoFila2" value="3.14" disabled>
                                </td>
                                <td>
                                    <input type="number"  class="form-control text-center" id="momentoFila2" name="momentoFila2" disabled>
                                </td>

                            </tr>

                            <tr>
                                <td>
                                    <label for="pesoFila3" class="form-control">FILA 3:</label>
                                </td>
                                <td>
                                    <input type="number" class="form-control text-center" id="pesoFila3" name="pesoFila3" disabled>
                                </td>
                                <td>
                                    <input type="number"  class="form-control text-center" id="bracoFila3" name="bracoFila3" value="4.04" disabled>
                                </td>
                                <td>
                                    <input type="number"  class="form-control text-center" id="momentoFila3" name="momentoFila3" disabled>
                                </td>

                            </tr>

                            <tr>
                                <td>
                                    <label for="pesoBagageiro1" class="form-control">BAGAGEIRO 1:</label>
                                </td>
                                <td>
                                    <input type="number" class="form-control text-center" id="pesoBagageiro1" name="pesoBagageiro1" onblur="calculoMomentoBagageiro1()"
                                    min="0" max="100">
                                </td>
                                <td>
                                    <input type="number"  class="form-control text-center" id="bracoBagageiro1" name="bracoBagageiro1" value="5.46" disabled>
                                </td>
                                <td>
                                    <input type="number"  class="form-control text-center" id="momentoBagageiro1" name="momentoBagageiro1" disabled>
                                </td>

                            </tr>

                            <tr>
                                <td>
                                    <label for="pesoBagageiro2" class="form-control">BAGAGEIRO 2:</label>
                                </td>
                                <td>
                                    <input type="number" class="form-control text-center" id="pesoBagageiro2" name="pesoBagageiro2"
                                    min="0" max="100" onblur="calculoTotal()">
                                </td>
                                <td>
                                    <input type="number"  class="form-control text-center" id="bracoBagageiro2" name="bracoBagageiro2" value="5.98" disabled>
                                </td>
                                <td>
                                    <input type="number"  class="form-control text-center" id="momentoBagageiro2" name="momentoBagageiro2" disabled>
                                </td>

                            </tr>


                            <tr>
                                <td>
                                    <label for="pesoCombustivel" class="form-control">COMBUSTIVEL:</label>
                                </td>
                                <td>
                                    <input type="text" class="form-control text-center" id="pesoCombustivel" name="pesoCombustivel" value="0" onblur="calculoMomentoTotal()">
                                </td>
                                <td>
                                    <input type="number"  class="form-control text-center" id="bracoCombustivel" name="bracoCombustivel" value="2.6" disabled>
                                </td>
                                <td>
                                    <input type="number"  class="form-control text-center" id="momentoCombustivel" name="momentoCombustivel" disabled>
                                </td>

                            </tr>


                            <tr>
                                <td>
                                    <label for="pesoTotal" class="form-control">TOTAL</label>
                                </td>
                                <td>
                                    <input type="text" class="form-control text-center" id="pesoTotal" name="pesoTotal" disabled>
                                </td>
                                <td>
                                    <input type="number"  class="form-control text-center" id="bracoTotal" name="bracoTotal" disabled>
                                </td>
                                <td>
                                    <input type="number"  class="form-control text-center" id="momentoTotal" name="momentoTotal" disabled>
                                </td>

                            </tr>

                            <tr class="text-center">
                                <td>
                                    <label><h6>Peso de Rampa</h6></label>
                                </td>
                                <td>
                                    <label><h6>3940 Kg</h6></label>
                                </td>
                                <td>
                                    <label><h6>8698 libras</h6></label>
                                </td>
                                <td>
                                    <label><h6>CG max. A frente</h6></label>
                                </td>
                                <td colspan="2">
                                    <label><h6>CG max. A trás</h6></label>
                                </td>

                            </tr>

                            <tr class="text-center">
                                <td>
                                    <label><h6>Peso máximo decolagem</h6></label>
                                </td>
                                <td>
                                    <label><h6>3890 Kg</h6></label>
                                </td>
                                <td>
                                    <label><h6>8575 libras</h6></label>
                                </td>
                                <td>
                                    <label><h6>2.15 m</h6></label>
                                </td>
                                <td colspan="2">
                                    <label><h6>2.51 m</h6></label>
                                </td>

                            </tr>

                            <tr class="text-center">
                                <td>
                                    <label><h6>Peso máximo pouso</h6></label>
                                </td>
                                <td>
                                    <label><h6>3890 Kg</h6></label>
                                </td>
                                <td>
                                    <label><h6>8575 libras</h6></label>
                                </td>
                                <td>
                                    <label><h6>84.65 pol</h6></label>
                                </td>
                                <td colspan="2">
                                    <label><h6>98.82 pol</h6></label>
                                </td>

                            </tr>



                            <!--PASSAGEIROS-->
                            <tr>
                                <thead>
                                <th colspan="6" class="text-center"><h3>PASSAGEIROS</h3></th>
                                </thead>
                            </tr>
                            <tr class="text-center">
                                <td colspan="3">
                                    <label><h6>NOME</h6></label>
                                </td>
                                <td>
                                    <label><h6>PESO (KG)</h6></label>
                                </td>
                                <td>
                                    <label><h6>IDADE</h6></label>
                                </td>
                                <td COLSPAN="4">
                                    <label><h6>CONTATO</h6></label>
                                </td>
                            </tr>

                            <tr>

                                <td colspan="3">
                                    <select class="form-control" name="nomePax1">
                                        <option value="">Selecione um Passageiro</option>
                                        <?php
                                            include_once 'conexao.php';

                                            $pesquisa = "SELECT * FROM passageiros";
                                            $resultado = mysqli_query($conn,$pesquisa);
                                            var_dump($resultado);
                                            while($row_cat = mysqli_fetch_assoc($resultado) ) {
                                            echo '<option value="'.$row_cat['idPassageiros'].'">'.$row_cat['nome'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="number"  class="form-control text-center" name="pesoPax" value="0">
                                </td>
                                <td>
                                    <input type="number"  class="form-control text-center" name="idadePax">
                                </td>
                                <td>
                                    <input type="text"  class="form-control text-center" name="contatoPax">
                                </td>

                            </tr>

                        <tr>

                            <td colspan="3">
                                <select class="form-control" name="nomePax2" onblur="calculoMomento1()">
                                <option value="">Selecione um Passageiro</option>
                                <?php
                                include_once 'conexao.php';

                                $pesquisa = "SELECT * FROM passageiros";
                                $resultado = mysqli_query($conn,$pesquisa);
                                var_dump($resultado);
                                while($row_cat = mysqli_fetch_assoc($resultado) ) {
                                    echo '<option value="'.$row_cat['idPassageiros'].'">'.$row_cat['nome'].'</option>';
                                }
                                ?>
                                </select>
                            </td>
                            <td>
                                <input type="text"  class="form-control text-center" name="pesoPax2" value="0">
                            </td>
                            <td>
                                <input type="text"  class="form-control text-center" name="idadePax2">
                            </td>
                            <td>
                                <input type="text"  class="form-control text-center" name="contatoPax2">
                            </td>

                        </tr>

                        <tr>

                            <td colspan="3">
                                <select class="form-control" name="nomePax3">
                                <option value="">Selecione um Passageiro</option>
                                <?php
                                include_once 'conexao.php';

                                $pesquisa = "SELECT * FROM passageiros";
                                $resultado = mysqli_query($conn,$pesquisa);
                                var_dump($resultado);
                                while($row_cat = mysqli_fetch_assoc($resultado) ) {
                                    echo '<option value="'.$row_cat['idPassageiros'].'">'.$row_cat['nome'].'</option>';
                                }
                                ?>
                                </select>
                            </td>
                            <td>
                                <input type="text"  class="form-control text-center" name="pesoPax3" value="0">
                            </td>
                            <td>
                                <input type="number"  class="form-control text-center" name="idadePax3">
                            </td>
                            <td>
                                <input type="text"  class="form-control text-center" name="contatoPax3">
                            </td>

                        </tr>

                        <tr>

                            <td colspan="3">
                                <select class="form-control" name="nomePax4" onblur="calculoMomento2()">
                                <option value="">Selecione um Passageiro</option>
                                <?php
                                include_once 'conexao.php';

                                $pesquisa = "SELECT * FROM passageiros";
                                $resultado = mysqli_query($conn,$pesquisa);
                                var_dump($resultado);
                                while($row_cat = mysqli_fetch_assoc($resultado) ) {
                                    echo '<option value="'.$row_cat['idPassageiros'].'">'.$row_cat['nome'].'</option>';
                                }
                                ?>
                                </select>
                            </td>
                            <td>
                                <input type="text"  class="form-control text-center" name="pesoPax4" value="0">
                            </td>
                            <td>
                                <input type="number"  class="form-control text-center" name="idadePax4">
                            </td>
                            <td>
                                <input type="text"  class="form-control text-center" name="contatoPax4">
                            </td>

                        </tr>


                        <tr>

                            <td colspan="3">
                                <select class="form-control" name="nomePax5"">
                                <option value="">Selecione um Passageiro</option>
                                <?php
                                include_once 'conexao.php';

                                $pesquisa = "SELECT * FROM passageiros";
                                $resultado = mysqli_query($conn,$pesquisa);
                                var_dump($resultado);
                                while($row_cat = mysqli_fetch_assoc($resultado) ) {
                                    echo '<option value="'.$row_cat['idPassageiros'].'">'.$row_cat['nome'].'</option>';
                                }
                                ?>
                                </select>
                            </td>
                            <td>
                                <input type="text"  class="form-control text-center" name="pesoPax5" value="0">
                            </td>
                            <td>
                                <input type="number"  class="form-control text-center" name="idadePax5">
                            </td>
                            <td>
                                <input type="text"  class="form-control text-center" name="contatoPax5">
                            </td>

                        </tr>


                        <tr>

                            <td colspan="3">
                                <select class="form-control" name="nomePax6" onblur="calculoMomento3()">
                                <option value="">Selecione um Passageiro</option>
                                <?php
                                include_once 'conexao.php';

                                $pesquisa = "SELECT * FROM passageiros";
                                $resultado = mysqli_query($conn,$pesquisa);
                                var_dump($resultado);
                                while($row_cat = mysqli_fetch_assoc($resultado) ) {
                                    echo '<option value="'.$row_cat['idPassageiros'].'">'.$row_cat['nome'].'</option>';
                                }
                                ?>
                                </select>
                            </td>
                            <td>
                                <input type="text"  class="form-control text-center" name="pesoPax6" value="0">
                            </td>
                            <td>
                                <input type="number"  class="form-control text-center" name="idadePax6">
                            </td>
                            <td>
                                <input type="text"  class="form-control text-center" name="contatoPax6">
                            </td>

                        </tr>

                        <tr>

                            <td colspan="3">
                                <select class="form-control" name="nomePax7">
                                    <option value="">Selecione um Passageiro</option>
                                    <?php
                                    include_once 'conexao.php';

                                    $pesquisa = "SELECT * FROM passageiros";
                                    $resultado = mysqli_query($conn,$pesquisa);
                                    var_dump($resultado);
                                    while($row_cat = mysqli_fetch_assoc($resultado) ) {
                                        echo '<option value="'.$row_cat['idPassageiros'].'">'.$row_cat['nome'].'</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <input type="text"  class="form-control text-center" name="pesoPax7" value="0">
                            </td>
                            <td>
                                <input type="number"  class="form-control text-center" name="idadePax7">
                            </td>
                            <td>
                                <input type="text"  class="form-control text-center" name="contatoPax7">
                            </td>

                        </tr>


                        </tbody>
                    </table>
                        <div class="form-group">
                            <input type="submit" name="btnCad" value="Salvar Planejamento"/>
                            <input type="reset" name="reset" value="Limpar Formulário"/>
                            <input type="submit" name="btnSair" value="Sair"/>
                        </div>
                </div>
            </div>

        </div>
    </div>



    <p class="mt-5 mb-3 text-muted text-center">&copy;by Albert Otto</p>
</form>


<!--Script para pax1 -->
<script type='text/javascript'>
    $(document).ready(function(){
        $("select[name='nomePax1']").change(function(){
            var idPax = $(this).val();
            $("input[name='pesoPax']").val('Carregando...');
            $("input[name='idadePax']").val('Carregando...');
            $("input[name='contatoPax']").val('Carregando...');

            $.getJSON('function2.php',
                {idPassageiros: idPax},
                function (json){
                    $("input[name='pesoPax']").val(json.pesoPax);
                    $("input[name='idadePax']").val(json.idadePax);
                    $("input[name='contatoPax']").val(json.contatoPax);
                });
        });
    });
</script>

<!--Script para pax3 -->
<script type='text/javascript'>
    $(document).ready(function(){
        $("select[name='nomePax2']").change(function(){
            var idPax = $(this).val();
            $("input[name='pesoPax2']").val('Carregando...');
            $("input[name='idadePax2']").val('Carregando...');
            $("input[name='contatoPax2']").val('Carregando...');
            var $pesoPax2 = $("input[name='pesoPax2']");

            $.getJSON('function2.php',
                {idPassageiros: idPax},
                function (json){
                    $pesoPax2.val(json.pesoPax);
                    $("input[name='idadePax2']").val(json.idadePax);
                    $("input[name='contatoPax2']").val(json.contatoPax);
                });
        });
    });
</script>

<!--Script para pax3 -->
<script type='text/javascript'>
    $(document).ready(function(){
        $("select[name='nomePax3']").change(function(){
            var idPax = $(this).val();
            $("input[name='pesoPax3']").val('Carregando...');
            $("input[name='idadePax3']").val('Carregando...');
            $("input[name='contatoPax3']").val('Carregando...');

            $.getJSON('function2.php',
                {idPassageiros: idPax},
                function (json){
                    $("input[name='pesoPax3']").val(json.pesoPax);
                    $("input[name='idadePax3']").val(json.idadePax);
                    $("input[name='contatoPax3']").val(json.contatoPax);
                });
        });
    });
</script>

<!--Script para pax4 -->
<script type='text/javascript'>
    $(document).ready(function(){
        $("select[name='nomePax4']").change(function(){
            var idPax = $(this).val();
            $("input[name='pesoPax4']").val('Carregando...');
            $("input[name='idadePax4']").val('Carregando...');
            $("input[name='contatoPax4']").val('Carregando...');

            $.getJSON('function2.php',
                {idPassageiros: idPax},
                function (json){
                    $("input[name='pesoPax4']").val(json.pesoPax);
                    $("input[name='idadePax4']").val(json.idadePax);
                    $("input[name='contatoPax4']").val(json.contatoPax);
                });
        });
    });
</script>

<!--Script para pax5 -->
<script type='text/javascript'>
    $(document).ready(function(){
        $("select[name='nomePax5']").change(function(){
            var idPax = $(this).val();
            $("input[name='pesoPax5']").val('Carregando...');
            $("input[name='idadePax5']").val('Carregando...');
            $("input[name='contatoPax5']").val('Carregando...');

            $.getJSON('function2.php',
                {idPassageiros: idPax},
                function (json){
                    $("input[name='pesoPax5']").val(json.pesoPax);
                    $("input[name='idadePax5']").val(json.idadePax);
                    $("input[name='contatoPax5']").val(json.contatoPax);
                });
        });
    });
</script>

<!--Script para pax6 -->
<script type='text/javascript'>
    $(document).ready(function(){
        $("select[name='nomePax6']").change(function(){
            var idPax = $(this).val();
            $("input[name='pesoPax6']").val('Carregando...');
            $("input[name='idadePax6']").val('Carregando...');
            $("input[name='contatoPax6']").val('Carregando...');

            $.getJSON('function2.php',
                {idPassageiros: idPax},
                function (json){
                    $("input[name='pesoPax6']").val(json.pesoPax);
                    $("input[name='idadePax6']").val(json.idadePax);
                    $("input[name='contatoPax6']").val(json.contatoPax);
                });
        });
    });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="js/coord.js"></script>
</body>
</html>
