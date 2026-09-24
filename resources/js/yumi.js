//Menu hamburguesa (Par movil)
const navToggle = document.getElementById('navToggle');
const navLinks = document.getElementById('navLinks');

navToggle.addEventListener('click', function(){
    navLinks.classList.toggle('open');
});

//Datos de la carta (de momento con array, en un futuro se podria poner desde la BD)
const platos = [
    {cat:'nigiri', name:'Nigiri de salmón', desc: 'Arroz avinagrado, salmón fresco'},
    {cat:'nigiri', name:'Nigiri de atún', desc: 'Arroz avinagrado, atún fresco'},
    {cat:'wok', name:'Yakisoba de ternera', desc: 'Fideos salteados, verdura de temporada.'},
    { cat: 'wok', name: 'Arroz tres delicias', desc: 'Al wok, huevo y guisante.' },
    { cat: 'gyoza', name: 'Gyozas de cerdo', desc: 'A la plancha, salsa ponzu.' },
    { cat: 'gyoza', name: 'Dim sum variado', desc: 'Cuatro piezas al vapor.' },
    { cat: 'poke', name: 'Poke de salmón', desc: 'Base de arroz, edamame, mango.' },
    { cat: 'poke', name: 'Tempura de langostinos', desc: 'Rebozado ligero, salsa tare.' }
];
//Pintar los platos en el HTML
const menuGrid = document.getElementById('menuGrid');

function renderPlatos(categoria){
    //Vacio lo que hubiera antes de volver a pintar
    menuGrid.innerHTML='';

    //'filter' se queda solo con los platos que cumplen la condición
    const platosFiltrados = platos.filter(function(plato){
        return categoria === 'todos' || plato.cat === categoria;
    });

    //forEach recorre cada plato filtrado y crea su tarjeta HTML
    platosFiltrados.forEach(function (plato){
        const tarjeta = document.createElement('div');
        tarjeta.className = 'dish-card';
        tarjeta.innerHTML = `
            <div class="dish-top">
                <span>${plato.name}</span>
            </div>
            <p>${plato.desc}</p>
        `;
        menuGrid.appendChild(tarjeta);
    });
}

//Muestro todos los platos en cuanto la pagina carga
renderPlatos('todos');

//Filtro por categorias
const menuTabs = document.getElementById('menuTabs');

menuTabs.addEventListener('click', function (evento){
    const boton = evento.target.closest('.menu-tab');
    if (!boton) return; //Si el clic no se hace sobre un boton, no hace nada

    //Quito "active" de todos los botones y solo se lo pongo al que se ha pulsado
    document.querySelectorAll('.menu-tab').forEach(function (b){
        b.classList.remove('active');
    });
    boton.classList.add('active');

    //Vuelvo a mostrar la carta, filtrada por la categoria de ese boton
    renderPlatos(boton.dataset.cat);
});

//Formulario de reservas (version provisional)
const resForm = document.getElementById('resForm');
const resStatus = document.getElementById('resStatus');

resForm.addEventListener('submit', async function (evento){
    //Evita que el formulario recargue la página 
    evento.preventDefault();

    resStatus.textContent = 'Enviando...';

    //FormData recoge automaticamente todos los campos del formulario
    //Usando sus atributos "name"
    const datos = new FormData(resForm);

    //Laravel exige ese token en cada peticion que modifica datos (POST, PUT, DELETE),
    //como proteccion contra atques. Se lee del <meta> que añadí en el <head>
    const token = document.querySelector('meta[name="csrf-token"]').content;

    try{
        const respuesta = await fetch('/reservas', {
            method:'POST',
            headers:{
                'X-CSRF-TOKEN':token,
                'Accept': 'application/json'
            },
            body:datos
        });

        if(respuesta.ok){
            resStatus.textContent='¡Reserva enviada! Te confirmaremos por teléfono en breve.';
            resForm.reset();
        }else{
            //Si laravel rechazó los datos (por ejemplo un campo mal rellenado),
            //devuelve error 422 con el detalle del fallo.
            const error = await respuesta.json();
            console.error(error);
            resStatus.textContent='Revisa los datos del formulario e inténtalo otra vez';
        }
    }catch (e){
        resStatus.textContent= 'No se ha podido enviar. Llámanos al 966 20 38 46';
    }
});