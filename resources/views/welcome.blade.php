<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurante Yu-mi</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/yumi.css', 'resources/js/yumi.js'])
    
</head>
<body>
    {{--Navegación--}}
    <nav class="site-nav">
        <div class="nav-inner">
            <a href="/" class="nav-mark">🍜 Yu-mi</a>

            <ul class="nav-links" id="navLinks">
                <li><a href="#carta">Carta</a></li>
                <li><a href="#precios">Precios</a></li>
                <li><a href="#reservas">Reservas</a></li>
                <li><a href="#nosotros">Nosotros</a></li>
                <li><a href="#contacto">Contacto</a></li>
            </ul>

            <a href="#reservas" class="nav-cta">Reservar mesa</a>
            <button class="nav-toggle" id="navToggle">☰</button>
        </div>
    </nav>

    {{--Portada--}}
    <header class="hero">
        <div class="pill-badge">⭐ 4,3 · 413 reseñas en Google</div>
        <h1>Buffet asiático libre, para toda la familia.</h1>
        <p>Sushi, wok, gyozas y tempura recién hechos, sin prisas y sin cartas complicadas. </p>
        
        <div class="hero-actions">
            <a href="#reservas" class="btn btn-primary">Reservar mesa</a>
            <a href="#carta" class="btn btn-ghost">Ver la carta</a>
        </div>

        <div class="hero-meta">
            <div class="meta-chip">Desde 20,95 €</div>
            <div class="meta-chip">2 turnos</div>
            <div class="meta-chip">Niños &lt;80cm gratis</div>
        </div>
    </header>

    {{--Para quien es la mesa--}}
    <section id="para-quien">
        <h2>Un plan que le gusta a cualquiera</h2>

        <div class="who-grid">
            <div class="who-card">
                <h3>Familias</h3>
                <p>Espacio y variedad para que cada uno elija lo suyo.</p>
            </div>
            <div class="who-card">
                <h3>Grupos de amigos</h3>
                <p>Mesas amplias y buffet libre para todos.</p>
            </div>
            <div class="who-card">
                <h3>Celebraciones</h3>
                <p>Cumpleaños o quedadas especiales, avísanos.</p>
            </div>
            <div class="who-card">
                <h3>Comidas de empresa</h3>
                <p>Rápido, variado y con precio cerrado.</p>
            </div>
        </div>
    </section>

    {{--precios--}}
    <section id="precios">
        <div class="buffet-banner">
            <span class="tag">Menú Buffet</span>
            <h3>Libre acceso a todas las estaciones</h3>
            <div class="buffet-hours">
                <div>Comidas - 13:00 - 16:30</div>
                <div>Cenas - 19:00 - 23:30</div>
            </div>
        </div>

        <div class="price-grid">
            <div class="price-card">
                <div class="price-badge">Mediodía Lun-Vie</div>
                <div class="price-row"><span>Adultos</span><strong>20,95€</strong></div>
                <div class="price-row"><span>Niños 80-130 cm</span><strong>12,95€</strong></div>
                <div class="price-row"><span>Menores de 80 cm</span><strong>Gratis</strong></div>
            </div>

            <div class="price-card">
                <div class="price-badge">Noche Lun-Jue</div>
                <div class="price-row"><span>Adultos</span><strong>22,95€</strong></div>
                <div class="price-row"><span>Niños 80-130 cm</span><strong>13,95€</strong></div>
                <div class="price-row"><span>Menores de 80 cm</span><strong>Gratis</strong></div>
            </div>

            <div class="price-card featured">
                <div class="price-badge">Noche Vie, festivos y fin de semana</div>
                <div class="price-row"><span>Adultos</span><strong>25,95€</strong></div>
                <div class="price-row"><span>Niños 80-130 cm</span><strong>25,95 €</strong></div>
                <div class="price-row"><span>Menores de 80 cm</span><strong>Gratis</strong></div>
            </div>
        </div>
    </section>

    {{--carta--}}
    <section id="carta">
        <h2>La carta</h2>

        <div class="menu-tabs" id="menuTabs">
            <button class="menu-tab active" data-cat="todos">Todos</button>
            <button class="menu-tab" data-cat="nigiri">Nigiri &amp; Sushi</button>
            <button class="menu-tab" data-cat="wok">Wok &amp; Yakisoba</button>
            <button class="menu-tab" data-cat="gyoza">Gyozas &amp; Dim Sum</button>
            <button class="menu-tab" data-cat="poke">Poke &amp; Tempura</button>
        </div>
        <p class="menu-note">Todo lo que ves aquí está incluido en el precio del buffet. Bebidas y postres van aparte (consulta precios en el restaurante).</p>

        <div class="menu-grid" id="menuGrid">
        
        </div>
    </section>

    {{--Reservas--}}
    <section id="reservas">
        <h2>Guárdanos un hueco</h2>

        <div class="res-info">
            <div>Comidas 13:00-16:00 · Cenas 19:00-23:30</div>
            <div>Teléfono: 966 20 38 46</div>
            <a href="#precios">Ver tarifas por turno</a>
        </div>

        <form id="resForm">
            <label for="rName">Nombre</label>
            <input id="rName" name="Name" type="text" required>

            <label for="rPhone">Teléfono</label>
            <input id="rPhone" name="Phone" type="tel" required>

            <label for="rDate">Fecha</label>
            <input id="rDate" name="date" type="date" required>

            <label for="rTime">Hora</label>
            <select id="rTime" name="time" required>
                <option value="">Elige una hora</option>
                <option>13:00</option>
                <option>14:00</option>
                <option>20:00</option>
                <option>21:00</option>
            </select>

            <label for="rGuests">Número de personas</label>
            <input id="rGuests" name="guests" type="number" min="1" max="10"  value="2" required>

            <label for="rEmail">Email</label>
            <input id="rEmail" name="email" type="email" required>

            <label for="rNotes">Notas/Alergias</label>
            <textarea id="rNotes" name="notes"></textarea>

            <button type="submit" class="btn btn-primary">Reservar</button>
            <div id="resStatus"></div>
        </form>
    </section>

    {{--sobre nosotros--}}
    <section id="nosotros">
        <h2>Cocina abierta, mesa compartida</h2>
        <p>Yu-mi nació para traer a Alicante el buffet asiático libre: nigiri, wok, dim sum y tempura conviviendo en un mismo espacio.</p>

        <div class="about-stats">
            <div><strong>4,3</strong><span>valoración media</span></div>
            <div><strong>413</strong><span>reseñas en Google</span></div>
            <div><strong>2</strong><span>turnos al día</span></div>
        </div>
    </section>

    {{--contacto--}}
    <section id="contacto">
        <h2>Te esperamos</h2>

        <div class="contact-card">
            <div>Avinguda de Dénia, 197, 03559 Alacant, Alicante</div>
            <a href="tel: 966203846">966 20 38 46</a>
            <div>Comidas 13:00-16:30 · Cenas 19:00-23:30</div>
            <a href="mailto:reservas@yu-mi.es">reservas@yu-mi.es</a>
        </div>

        <div class="map-frame">
            <iframe loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                src="https://www.google.com/maps?q=Avinguda+de+Denia+197+03559+Alicante&output=embed">
            </iframe>
        </div>
    </section>

    {{--footer--}}
    <footer>
        <div>🍜 Yu-mi · Restaurante asiático · Alicante</div>
        <div>© 2026 Yu-mi</div>
    </footer>

    <script>

    </script>
</body>
</html>