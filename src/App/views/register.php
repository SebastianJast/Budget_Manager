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
            <div class="row d-flex flex-column flex-lg-row align-items-center">
                <div class="col-12 col-sm-6 col-lg-6 order-2">
                    <img
                        src="../images/account.svg"
                        class="d-block mx-lg-auto img-fluid"
                        alt="Account"
                        width="700"
                        height="500"
                        loading="lazy" />
                </div>
                <div class="container col-12 col-sm-12 col-lg-6">
                    <?php var_dump($errors); ?>
                    <form action="/register" method="POST" class="w-100">
                        <h2 class="h1 mb-3 fw-bold text-white">Rejestracja</h2>
                        <div class="form-floating my-4">
                            <input
                                name="login"
                                type="text"
                                class="form-control"
                                id="floatingInput"
                                placeholder="name@example.com" />
                            <label class="label-login" for="floatingInput">Login</label>
                        </div>
                        <div class="form-floating">
                            <input
                                name="email"
                                type="email"
                                class="form-control"
                                id="floatingPassword"
                                placeholder="Password" />
                            <label for="floatingPassword">Email</label>
                        </div>
                        <div class="form-floating my-4">
                            <input
                                name="password"
                                type="password"
                                class="form-control"
                                id="floatingPassword"
                                placeholder="Password" />
                            <label for="floatingPassword">Hasło</label>
                        </div>
                        <div class="form-floating my-4">
                            <input
                                name="confirmPassword"
                                type="password"
                                class="form-control"
                                id="floatingPassword"
                                placeholder="Password" />
                            <label for="floatingPassword">Powtórz hasło</label>
                        </div>
                        <div class="form-check text-start my-3">
                            <input
                                name="terms"
                                class="form-check-input"
                                type="checkbox"
                                id="flexCheckDefault" />
                            <label
                                class="form-check-label text-white"
                                for="flexCheckDefault">
                                Akceptuję regulamin
                            </label>
                        </div>
                        <button
                            class="btn btn-success w-100 py-3 btn-sign-in text-white"
                            type="submit">
                            Zarejestruj
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include $this->resolve("partials/_footer.php") ?>