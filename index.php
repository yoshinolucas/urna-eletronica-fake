<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="eleicao.css">
    <title>Eleição</title>
</head>
<body>
    <div class="urna">
        <div class="display-urna">
            <input name="candidato" type="text" id="candidato">
            <h3 id="voto"></h3>
        </div>
        <div class="teclado-urna">
            <div class="teclado">
                <div class="fileira">
                    <button class="tecla" onclick="apertado(1)">1</button>
                    <button class="tecla" onclick="apertado(2)">2</button>
                    <button class="tecla" onclick="apertado(3)">3</button>
                </div>
                <div class="fileira">
                    <button class="tecla" onclick="apertado(4)">4</button>
                    <button class="tecla" onclick="apertado(5)">5</button>
                    <button class="tecla" onclick="apertado(6)">6</button>
                </div>
                <div class="fileira">
                    <button class="tecla" onclick="apertado(7)">7</button>
                    <button class="tecla" onclick="apertado(8)">8</button>
                    <button class="tecla" onclick="apertado(9)">9</button>
                </div>
                <div class="fileira">
                    <button class="tecla"
                            style="position: relative; left: 40px"
                            onclick="apertado(0)">0
                    </button>
                </div>    
            </div>

            <div class="button-group">
                <button class="branco" id="branco">BRANCO</button>
                <button class="corrige" id="corrige">CORRIGE</button>
                <button class="confirma" 
                id="confirma">CONFIRMA</button>
            </div>
            
        </div>
    </div>
    
    <div>
        <button id="show-resultado">Imprimir resultado</button>
        <h2 id="eleito"></h2>
        <ul id="resultados"></ul>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    const total = {}
    var candidato = $('#candidato')
    var branco = false

    function apertado(valor){
        candidato.val(candidato.val()+valor)
    }
    $("#branco").on("click", function(e){
        e.preventDefault();
        branco = true;
        $("#voto").text('Aperte CONFIRMA para computar voto BRANCO')
    })
    $("#corrige").on("click", function(e){
        e.preventDefault();
        candidato.val(candidato.val().slice(0,-1))
    })
    $("#confirma").on("click", function(e){
            e.preventDefault();
            var candidato_format = ''
            if(branco){
                total.Branco = total.Branco + 1 || 1
            } else if(candidato.val() == ''){
                candidato_format = 'Digite 2 números';
            } else if(candidato.val() == '22') {
                candidato_format = 'Votou em Bolsonaro'
                total.Bolsonaro = total.Bolsonaro + 1 || 1
            } else if(candidato.val() == '13') {
                candidato_format = 'Votou em Lula'
                total.Lula = total.Lula + 1 || 1
            } else if(candidato.val() == '12') {
                candidato_format = 'Votou em Ciro'
                total.Ciro = total.Ciro + 1 || 1
            } else {
                candidato_format = 'Voto Nulo'
                total.Nulo = total.Nulo + 1 || 1
            }
            $("#voto").text(candidato_format)
            candidato.val('')
            branco = false
        }
    )
    $("#show-resultado").on("click", function(e){
        e.preventDefault();
        $("#resultados").empty()
        for(key in total) {
            $("#resultados").append(`<li>${key + ': ' + total[key]}</li>`)
        }
    })
</script>
</html>
