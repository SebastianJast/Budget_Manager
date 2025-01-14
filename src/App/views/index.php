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
        <div class="container col-xxl-10 d-flex justify-content-lg-start">
            <h1 class="display-1 fw-bold text-white lh-1 mt-4">Budget Manager</h1>
        </div>
    </header>
    <main>
        <div class="container col-xxl-10 px-4 py-1">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-12 col-sm-12 col-lg-6">
                    <img
                        src="./images/budget.svg"
                        class="d-block mx-lg-auto img-fluid"
                        alt="Budget"
                        width="700"
                        height="500"
                        loading="lazy" />
                </div>
                <div class="col-lg-6">
                    <p class="lead text-white">
                        Masz ciągle problemy finasowe? Nie wiesz ile wydałeś i na co
                        wydałeś? Ta aplikacja jest właśnie dla Ciebie! Dzięki aplikacji
                        Budget Manager będiesz mógł nareszcie kontrolować swoje wydatki.
                        Wystarczy tylko dokonać darmowej rejestracji i zalogować się na
                        wybrane konto.
                    </p>
                    <div class="mt-2 border border-white p-1">
                        <p class="lead text-white"><span class="fw-bold">Krok1: </span>Załóż konto i dołącz do grona użytkowników</p>
                    </div>
                    <div class="mt-2 border border-white p-1">
                        <p class="lead text-white"><span class="fw-bold">Krok2: </span>Dodaj swoje przychody oraz wydatki do aplikacji, a następnie sprawdź ich bilans</p>
                    </div>
                    <div class="mt-2 border border-white p-1">
                        <p class="lead text-white"><span class="fw-bold">Krok3: </span>Obserwuj gromadzone oszczędności lub dowiedz się, czy znajdujesz się pod kreską</p>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <a type="button" class="btn btn-primary btn-lg px-4 me-md-2 mt-4 btn-register" href="/register">
                            Rejestracja
                        </a>
                        <a
                            type="button"
                            class="btn btn-outline-secondary btn-lg px-3 mt-4"
                            href="/login">
                            Logowanie
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include $this->resolve("partials/_footer.php") ?>