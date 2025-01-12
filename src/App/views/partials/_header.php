<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo e($title); ?> - Budget Manager</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="/assets/main.css" />
</head>

<body>
    <header>
        <div
            class="container col-xxl-10 d-flex justify-content-lg-start justify-content-center">
            <h1 class="display-1 fw-bold text-white lh-1 mt-4">Budget Manager</h1>
        </div>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="d-flex justify-content-end container-fluid">
                    <button
                        class="navbar-toggler bg-white"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarNav"
                        aria-controls="navbarNav"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div
                        class="collapse navbar-collapse flex-column justify-content-center"
                        id="navbarNav">
                        <ul class="navbar-nav flex-lg-row flex-column align-items-center">
                            <li class="nav-item px-4">
                                <a href="/main" class="nav-link link-light active" aria-current="page">Strona główna</a>
                            </li>
                            <li class="nav-item px-4">
                                <a href="/income" class="nav-link link-light active">Dodaj przychód</a>
                            </li>
                            <li class="nav-item px-4">
                                <a href="/expense" class="nav-link link-light active">Dodaj wydatek</a>
                            </li>
                            <li class="nav-item px-4">
                                <a href="/" class="nav-link link-light active">Przeglądaj bilans</a>
                            </li>
                            <li class="nav-item px-4">
                                <a href="#" class="nav-link link-light active">Ustawienia</a>
                            </li>
                            <li class="nav-item px-4">
                                <a href="/logout" class="nav-link link-light active">Wyloguj się</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>