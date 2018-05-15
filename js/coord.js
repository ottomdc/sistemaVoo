/**
 * Created by Missao do Ceu on 08/02/2018.
 */

function calculo(){
    var combDec = document.getElementById('combDecolagem').value;
    var combPouso = document.getElementById('combPouso').value;
    var autonomia =  combDec/200;
    var pesoComb = combDec*0.8;
    var combUtilizado = combDec - combPouso;


    document.getElementById('autonomia').value = autonomia;
    document.getElementById('pesoComb').value = pesoComb;
    document.getElementById('pesoCombustivel').value = pesoComb;
    calculoMomentoCombustivel();
}



function calculo2(){
    var combDec = document.getElementById('combDecolagem').value;
    var combPouso = document.getElementById('combPouso').value;
    var combUtilizado = combDec - combPouso;


    if(combPouso == 0 || combPouso ==''){
        document.getElementById('combUtilizado').value = 0;
    }else{
        document.getElementById('combUtilizado').value=combUtilizado;
    }
}



function calculo3(){
    var FL = document.getElementById('nivel').value;
    document.getElementById('fl').value=FL;
}


function calculoMomentoPilotos(){
    var peso1 = $("input[name='pesoTripulacao']").val();
    var momento = peso1 * 1.4;
    document.getElementById('momentoTripulacao').value = momento;
}

function calculoMomento1(){

    var peso1 = $("input[name='pesoPax']").val();
    var peso2 = $("input[name='pesoPax2']").val();
    var pesoFila = parseInt(peso1,10) + parseInt(peso2,10);
    document.getElementById('pesoFila1').value = pesoFila;
    var momento = pesoFila * 2.23;
    document.getElementById('momentoFila1').value = momento;
}

function calculoMomento2(){

    var peso1 = $("input[name='pesoPax3']").val();
    var peso2 = $("input[name='pesoPax4']").val();
    var pesoFila = parseInt(peso1,10) + parseInt(peso2,10);
    document.getElementById('pesoFila2').value = pesoFila;
    var momento = pesoFila * 3.14;
    document.getElementById('momentoFila2').value = momento;

}

function calculoMomento3(){

    var peso1 = $("input[name='pesoPax5']").val();
    var peso2 = $("input[name='pesoPax6']").val();
    var pesoFila = parseInt(peso1,10) + parseInt(peso2,10);
    document.getElementById('pesoFila3').value = pesoFila;
    var momento = pesoFila * 4.04;
    document.getElementById('momentoFila3').value = momento;

}


function calculoMomentoBagageiro1(){
    var peso1 = $("input[name='pesoBagageiro1']").val();
     var momento = peso1 * 5.46;
    document.getElementById('momentoBagageiro1').value = momento;

}

function calculoMomentoBagageiro2(){
    var peso1 = $("input[name='pesoBagageiro2']").val();
    var momento = peso1 * 5.98;
    document.getElementById('momentoBagageiro2').value = momento;
    calculoTotal();
}

function calculoMomentoCombustivel(){
    var peso1 = $("input[name='pesoCombustivel']").val();
    var momento = peso1 * 2.6;
    document.getElementById('momentoCombustivel').value = momento;
}

function calculoMomentoTotal(){
    var momentoVazio = parseInt($("input[name='momentoVazio']").val(),10);
    var momentoTripulacao = parseInt($("input[name='momentoTripulacao']").val(),10);
    var momentoFila1 = parseInt($("input[name='momentoFila1']").val(),10);
    var momentoFila2 = parseInt($("input[name='momentoFila2']").val(),10);
    var momentoFila3 = parseInt($("input[name='momentoFila3']").val(),10);
    var momentoBagagem1 = parseInt($("input[name='momentoBagageiro1']").val(),10);
    var momentoBagagem2 = parseInt($("input[name='momentoBagageiro2']").val(),10);
    var momentoCombustivel = parseInt($("input[name='momentoCombustivel']").val(),10);

    var momentoTotal = momentoVazio+momentoTripulacao+momentoFila1+momentoFila2+momentoFila3+
        momentoBagagem1+momentoBagagem2+momentoCombustivel;

    document.getElementById('momentoTotal').value = momentoTotal;
    calculoCG();
}

function calculoTotal(){

    var pesoVazio = parseInt($("input[name='pesoVazio']").val(), 10);

    var pesoTripulacao = parseInt($("input[name='pesoTripulacao']").val(),10);

    var pesoFila1 = parseInt($("input[name='pesoFila1']").val(),10);

    var pesoFila2 = parseInt($("input[name='pesoFila2']").val(),10);

    var pesoFila3 = parseInt($("input[name='pesoFila3']").val(),10);

    var pesoBagagem1 = parseInt($("input[name='pesoBagageiro1']").val(),10);

    var pesoBagagem2 = parseInt($("input[name='pesoBagageiro2']").val(),10);

    var pesoCombustivel = parseInt($("input[name='pesoCombustivel']").val(),10);



    var pesoTotal = pesoVazio+pesoTripulacao+pesoFila1+pesoFila2+pesoFila3+pesoBagagem1+pesoBagagem2+pesoCombustivel;

    document.getElementById('pesoTotal').value = pesoTotal;
    calculoMomentoBagageiro2();


}

function calculoCG(){
    var pesoTotal = parseInt($("input[name='pesoTotal']").val(),10);
    var momentoTotal = parseInt($("input[name='momentoTotal']").val(),10);
    var cg = momentoTotal/pesoTotal;
    document.getElementById('bracoTotal').value = cg;

}









