@extends('layouts.base')
@section('navbar')

<nav class="navbar bg-body-tertiary mb-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col col-4">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="col col-8">
                    <a class="navbar-brand" href="/">Build de artefactos</a>
                </div>
            </div>
            
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasTitle">Menú</h5>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active text-secondary" href="/">Revisar artefactos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-secondary" href="/current-builds">Builds actuales</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-gear"></i>
                                Configuraciones
                            </a>
                            <ul class="dropdown-menu" style="border: none">
                                <li>
                                    <a class="dropdown-item text-secondary" href="/characters">Personajes</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-secondary" href="/sets">Set de artefactos</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-secondary" href="/stats">Estadísticas Principales</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-secondary" href="/substats">Subestadísticas</a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

@endsection
