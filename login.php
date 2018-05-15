<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Completar proximos campos</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>

</head>
<body>
<script type='text/javascript'>
    $(document).ready(function(){
        $("select[name='matricula']").change(function(){
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
<h1>Aluno</h1>
<form method="POST" action="">
    <select class="form-control" name="matricula">
        <option value="">Selecione um Passageiro</option>
        <?php
        include_once 'conexao.php';

        $pesquisa = "SELECT * FROM passageiros";
        $resultado = mysqli_query($conn,$pesquisa);
        while($row_cat = mysqli_fetch_assoc($resultado) ) {
            echo '<option value="'.$row_cat['idPassageiros'].'">'.$row_cat['nome'].'</option>';
        }
        ?>
    </select><br><br><br>

    <label>Peso (KG)</label>
    <input type="text" class="form-control" name="pesoPax"><br><br>

    <label>Idade</label>
    <input type="text" class="form-control" name="idadePax"><br><br>


    <label>Contato</label>
    <input type="text" class="form-control" name="contatoPax"><br><br>

    <input type="submit" value="Editar">
</form>
</body>
</html>