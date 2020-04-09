let temporizador = document.getElementById('temporizador');
    let iniciar = document.getElementById('iniciar');
    let pausar = document.getElementById('pausar');
    let menu = document.getElementById('menu');
    let tiempo = 0,
        intervalo = 0;
    let verificador = false;

    init();


    function init() {
        iniciar.addEventListener('click', iniciarContador);
        pausar.addEventListener('click', pausarContador);
    }

    function iniciarContador() {
        let j=intervalo;
        if (verificador == false) {
     
            intervalo = setInterval(function() {
                tiempo += 0.01;
                console.log(intervalo);
                
                temporizador.innerHTML = tiempo.toFixed(2);
            }, 10);
            verificador = true;
            if(j==200){
                tiempo=0;
            }
        }


    }


    function pausarContador() {
        if (verificador == true) {
            clearInterval(intervalo);
            verificador = false;
        }
    }