<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AHORCADO</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .gris, body{
        background-color: #fdfdfd;
        }

        #imagen{
            max-height: 45vh;
        }
        .btn {
            padding: 0.25em 0.75em;
        }
        .btn:disabled {
            background: #BBB;
        }
        .contador{
            position: absolute;
            left: 80%;
            top: 250px;
            background-color: rgba(199, 210, 226,0.4);
            border-radius: 9px;
            padding: 0.6em;
            font-size: 1.3em;
            font-weight:bold;
            font-family: "Trebuchet MS", Helvetica, sans-serif
        }

        @media (max-width: 768px) {
            #imagen{
                max-height: 35vh;
            }
            .btn {
                margin: 1%;
                width: 12%;
                padding: 0.5em;
                border-radius: 50%;
            }
            .contador{
                position:static;
                font-size: 0.9em;
                color: blue;
                padding:10px;
            }
        }
    </style>
</head>
<body>
    <center>  <h1>AHORCADO</h1></center>
    <div class="container mt-5 d-flex flex-column justify-content-center align-items-center gris ">
        <div id="teclado" class="container d-flex flex-row flex-wrap justify-content-center align-items-center col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 mx-0 px-0">
            <button id = "a" type="button" class="btn btn-secondary" onclick="enviado('a')">A</button>
            <button id = "b" type="button" class="btn btn-secondary" onclick="enviado('b')">B</button>
            <button id = "c" type="button" class="btn btn-secondary" onclick="enviado('c')">C</button>
            <button id = "d" type="button" class="btn btn-secondary" onclick="enviado('d')">D</button>
            <button id = "e" type="button" class="btn btn-secondary" onclick="enviado('e')">E</button>
            <button id = "f" type="button" class="btn btn-secondary" onclick="enviado('f')">F</button>
            <button id = "g" type="button" class="btn btn-secondary" onclick="enviado('g')">G</button>
            <button id = "h" type="button" class="btn btn-secondary" onclick="enviado('h')">H</button>
            <button id = "i" type="button" class="btn btn-secondary" onclick="enviado('i')">I</button>
            <button id = "j" type="button" class="btn btn-secondary" onclick="enviado('j')">J</button>
            <button id = "k" type="button" class="btn btn-secondary" onclick="enviado('k')">K</button>
            <button id = "l" type="button" class="btn btn-secondary" onclick="enviado('l')">L</button>
            <button id = "m" type="button" class="btn btn-secondary " onclick="enviado('m')">M</button>
            <button id = "n" type="button" class="btn btn-secondary"onclick="enviado('n')">N</button>
            <button id = "ñ" type="button" class="btn btn-secondary"onclick="enviado('ñ')">Ñ</button>
            <button id = "o" type="button" class="btn btn-secondary"onclick="enviado('o')">O</button>
            <button id = "p" type="button" class="btn btn-secondary"onclick="enviado('p')">P</button>
            <button id = "q" type="button" class="btn btn-secondary"onclick="enviado('q')">Q</button>
            <button id = "r" type="button" class="btn btn-secondary"onclick="enviado('r')">R</button>
            <button id = "s" type="button" class="btn btn-secondary"onclick="enviado('s')">S</button>
            <button id = "t" type="button" class="btn btn-secondary"onclick="enviado('t')">T</button>
            <button id = "u" type="button" class="btn btn-secondary"onclick="enviado('u')">U</button>
            <button id = "v" type="button" class="btn btn-secondary"onclick="enviado('v')">V</button>
            <button id = "w" type="button" class="btn btn-secondary"onclick="enviado('w')">W</button>
            <button id = "x" type="button" class="btn btn-secondary"onclick="enviado('x')">X</button>
            <button id = "y" type="button" class="btn btn-secondary"onclick="enviado('y')">Y</button>
            <button id = "z" type="button" class="btn btn-secondary" onclick="enviado('z')">Z</button>
        </div>
    <div>
    <img  id="imagen"  class="img-fluid" src="https://jadigar.neocities.org/codepen/ahorcado-0.jpg" alt="ahorcado" ></div>
    <div id="container" class="display-4 text-center"></div>
    <div id="fallos" class="mt-3">Con 6 fallos Hangi será ahorcado<br></div>
        </div>
        <div class="contador">Hangi ha muerto <span id="lost">0</span> veces<br>Has acertado <span id="win">0</span> palabras</div>
</body>

<script>
    var tabla = [ "riqueza", "dinero", "fortuna", "riquezas", "abundancia", "prosperidad", "opulencia", "control", "capital", "patrimonio", "ganancias", "beneficios", "millones", "lucro", "lujos", "exito", "logro", "triunfo", "realizacion", "progreso", "superacion", "victoria", "ascenso", "lograr", "prosperar", "crecer", "avanzar", "sobresalir", "triunfar", "poder", "dominio", "autoridad", "control", "influencia", "potencia", "capacidad", "fuerza", "habilidad", "competencia", "empoderamiento", "esfuerzo", "diciplina", "automejora", "progreso", "superacion", "mejora", "crecimiento", "finanzas", "economía", "monetario", "capitalismo", "mercado", "criptomonedas", "inversión", "bolsa", "acciones", "divisas", "activos", "pasivos", "efectivo", "finanza", "economia", "estabilidad", "prosperidad", "solvencia", "liquidez", "inversiones", "autos", "diamantes", "bienes"];
        var indice = Math.floor(Math.random()*70);
        var palabra = tabla[indice];
        var arrayp = palabra.split("");
        var container = document.getElementById("container");
        var salida = document.getElementById("fallos");
        var solucion = [];
        var fallos = 0;
        var finalGanado=false;
        var won=0;
        var lost=0;
        for (var i = 0; i < arrayp.length; i++) {
            solucion.push("-");
            container.innerHTML = solucion.join(" ");
        }

        console.log(indice);
        function enviado(tecla) {
            var boton =document.getElementById(tecla);
            boton.disabled = true;
            var encontrado = palabra.indexOf(tecla);

            if ( encontrado != -1){

                for (var j = 0; j < arrayp.length; j++) {
                    if (arrayp[j] == tecla){
                        solucion[j] = tecla;
                    }
                    container.innerHTML = solucion.join(" ");
                    var terminado = solucion.indexOf("-");
                    if (terminado == -1){
                        container.innerHTML += "<br>LO CONSEGUISTE !!!! ";
                finalGanado= true;
                        var teclado = document.getElementById('teclado');
                        teclado.innerHTML="";
                        salida.innerHTML = muestraboton();
                    }
                }
            if (finalGanado){
                won++;
                finalGanado=false;
            }
            }else{
                fallos ++;
            salida.innerHTML ="Con "+(6-fallos)+" fallos Hangi será ahorcado";
                document.getElementById('imagen').src = "https://jadigar.neocities.org/codepen/ahorcado-"+ fallos + ".jpg";
                //salida.innerHTML += tecla+", ";
                if (fallos >=6){
                container.innerHTML = "PERDISTE !!!!! ";
                lost++;
                salida.innerHTML = '<div class="d-flex flex-column align-items-center"><div>La solución era: ' + palabra + '</div><div>' + muestraboton()+'</div></div>';
                var teclado = document.getElementById('teclado');
                teclado.innerHTML="";
                }
            }
        // x.value = "";
        }
        function muestraboton(){
        return ('<button type="button" class="btn btn-secondary" onclick="reiniciar()">Jugar otra vez</button> ')
        }
        function reiniciar(){
        indice = Math.floor(Math.random()*481);
        palabra = tabla[indice];
        arrayp = palabra.split("");
        solucion = [];
        fallos = 0;
        for (var i = 0; i < arrayp.length; i++) {
            solucion.push("-");
            salida.innerHTML ="Con 6 fallos Hangi será ahorcado";
            container.innerHTML = solucion.join(" ");
            document.getElementById('lost').innerHTML = lost;
            document.getElementById('win').innerHTML = won;
            document.getElementById('imagen').src = "https://jadigar.neocities.org/codepen/ahorcado-0.jpg";
            teclado.innerHTML = '<button id = "a" type="button" class="btn btn-secondary" onclick="enviado(\'a\')">A</button>			    <button id = "b" type="button" class="btn btn-secondary" onclick="enviado(\'b\')">B</button>			    <button id = "c" type="button" class="btn btn-secondary" onclick="enviado(\'c\')">C</button>			    <button id = "d" type="button" class="btn btn-secondary" onclick="enviado(\'d\')">D</button>			    <button id = "e" type="button" class="btn btn-secondary" onclick="enviado(\'e\')">E</button>			    <button id = "f" type="button" class="btn btn-secondary" onclick="enviado(\'f\')">F</button>      <button id = "g" type="button" class="btn btn-secondary" onclick="enviado(\'g\')">G</button>			    <button id = "h" type="button" class="btn btn-secondary" onclick="enviado(\'h\')">H</button>			    <button id = "i" type="button" class="btn btn-secondary" onclick="enviado(\'i\')">I</button>			    <button id = "j" type="button" class="btn btn-secondary" onclick="enviado(\'j\')">J</button>			    <button id = "k" type="button" class="btn btn-secondary" onclick="enviado(\'k\')">K</button>			    <button id = "l" type="button" class="btn btn-secondary" onclick="enviado(\'l\')">L</button>			    <button id = "m" type="button" class="btn btn-secondary " onclick="enviado(\'m\')">M</button> 				<button id = "n" type="button" class="btn btn-secondary"onclick="enviado(\'n\')">N</button>			    <button id = "ñ" type="button" class="btn btn-secondary"onclick="enviado(\'ñ\')">Ñ</button>			    <button id = "o" type="button" class="btn btn-secondary"onclick="enviado(\'o\')">O</button>			    <button id = "p" type="button" class="btn btn-secondary"onclick="enviado(\'p\')">P</button>			    <button id = "q" type="button" class="btn btn-secondary"onclick="enviado(\'q\')">Q</button>			    <button id = "r" type="button" class="btn btn-secondary"onclick="enviado(\'r\')">R</button>			    <button id = "s" type="button" class="btn btn-secondary"onclick="enviado(\'s\')">S</button>			    <button id = "t" type="button" class="btn btn-secondary"onclick="enviado(\'t\')">T</button>			    <button id = "u" type="button" class="btn btn-secondary"onclick="enviado(\'u\')">U</button>			    <button id = "v" type="button" class="btn btn-secondary"onclick="enviado(\'v\')">V</button>			    <button id = "w" type="button" class="btn btn-secondary"onclick="enviado(\'w\')">W</button>			    <button id = "x" type="button" class="btn btn-secondary"onclick="enviado(\'x\')">X</button>			    <button id = "y" type="button" class="btn btn-secondary"onclick="enviado(\'y\')">Y</button>			    <button id = "z" type="button" class="btn btn-secondary" onclick="enviado(\'z\')">Z</button>'
        }
        }
</script>
</html>

