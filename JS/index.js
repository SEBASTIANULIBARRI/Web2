let doc = document.querySelectorAll("div");
for( let e of doc){
    console.log(e);
    e.addEventListener("click",acciones
);
}

async function acciones(e){
    // if (e.target === e.currentTarget) {
    let elemento = e.currentTarget;
    console.log();
    elemento.classList.toggle("remarcado");
    let Url = "./tarea/" + elemento.id;
    console.log(Url);
    let respuesta = await fetch(Url);
    let resultado = await respuesta.text();
    document.querySelector("body").innerHTML += resultado;
    let doc = document.querySelectorAll("div");
    for( let e of doc){
        console.log(e);
        e.addEventListener("click",acciones
    );
    }
    console.log(respuesta)
}