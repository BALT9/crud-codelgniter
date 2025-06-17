<nav class="navbar navbar-expand-lg fixed-top px-4" style="
    background: rgba(10, 25, 47, 0.7);
    backdrop-filter: saturate(180%) blur(10px);
    box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 0.3);
    border-radius: 0 0 15px 15px;
    z-index: 1000;
">
    <div class="container">
        <a class="navbar-brand fw-bold text-white" href="#">GeoApp</a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav gap-3">
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" aria-current="page" href="#modalContinente" data-bs-toggle="modal">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="#continentes">Continentes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="#paises">Países</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="#estados">Estados</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-simple d-flex align-items-center justify-content-center text-center text-white" style="
    background: url('https://i.pinimg.com/736x/da/02/34/da02345437b66c6a136590a304402ea0.jpg') center/cover no-repeat;
    height: 80vh;
    position: relative;
    padding-top: 70px; /* navbar altura */
">
    <div style="
        position: absolute;
        inset: 0;
        background-color: rgba(0,0,0,0.4);
    "></div>

    <div style="position: relative; z-index: 1; max-width: 600px; padding: 0 15px;">
        <h1 class="display-4 fw-bold mb-3 text-shadow">Administra el Mundo</h1>
        <p class="lead mb-4 text-shadow">Controla continentes, países y estados de manera eficiente y visual.</p>
        <a href="#modalContinente" class="btn btn-primary btn-lg px-4" data-bs-toggle="modal">Comenzar</a>
    </div>

    <style>
        .text-shadow {
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        }

        .nav-link:hover,
        .nav-link:focus {
            text-decoration: underline;
            color: #a8d0ff !important;
        }
    </style>
</section>