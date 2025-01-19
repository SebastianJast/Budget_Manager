<?php include $this->resolve("partials/_header.php") ?>
<main>
    <h2 class="display-5 fw-bold text-white lh-1 mt-4 text-center mb-4">
        Dostępne opcje edycji
    </h2>
    <div
        class="row d-flex flex-column flex-lg-row justify-content-center align-items-center gap-4 row-cols-1 row-cols-md-2 mb-3 text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <p class="my-0 fw-normal">Edycja nazwy kategorii</p>
                </div>
                <div class="card-body d-flex">
                    <a class="dropdown-item text-decoration-none text-dark active" data-bs-toggle="modal" data-bs-target="#editIncomesCategoryForm"
                        href="#">Przychody</a>
                    <a class="dropdown-item text-decoration-none text-dark active" data-bs-toggle="modal" data-bs-target="#editExpensesCategoryForm"
                        href="#">Wydatki</a>
                    <a class="dropdown-item text-decoration-none text-dark active" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        href="#">Sposoby płatności</a>
                </div>
                <div class="card-header py-3">
                    <p class="my-0 fw-normal">Dodanie nowej kategorii</p>
                </div>
                <div class="card-body d-flex">
                    <a class="dropdown-item text-decoration-none text-dark active" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        href="#">Przychody</a>
                    <a class="dropdown-item text-decoration-none text-dark active" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        href="#">Wydatki</a>
                    <a class="dropdown-item text-decoration-none text-dark active" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        href="#">Sposoby płatności</a>
                </div>
                <div class="card-header py-3">
                    <p class="my-0 fw-normal">Usuwanie kategorii</p>
                </div>
                <div class="card-body d-flex">
                    <a class="dropdown-item text-decoration-none text-dark active" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        href="#">Przychody</a>
                    <a class="dropdown-item text-decoration-none text-dark active" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        href="#">Wydatki</a>
                    <a class="dropdown-item text-decoration-none text-dark active" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        href="#">Sposoby płatności</a>
                </div>
                <div class="card-header py-3">
                    <p class="my-0 fw-normal">Edycja konta Użytkownika</p>
                </div>
                <div class="card-body">
                    <a class="dropdown-item text-decoration-none text-dark active my-3" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        href="#">Edycja danych Użytkownika</a>
                    <a class="dropdown-item text-decoration-none text-dark active" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        href="#">Usuń swoje konto</a>
                </div>
                <div class="card-header py-3">
                    <p class="my-0 fw-normal">Powrót do menu głównego</p>
                </div>
            </div>
            <div
                class="modal fade"
                id="editIncomesCategoryForm"
                tabindex="-1"
                aria-labelledby="editIncomesCategoryLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header position-relative" style="height: 100px;">
                            <h5 class="modal-title position-absolute start-50 top-50 translate-middle" id="editIncomesCategoryLabel">
                                Wybierz kategorię do edycji i podaj nową nazwę:
                            </h5>
                            <button
                                type="button"
                                class="btn-close position-absolute top-0 end-0 me-2 mt-2"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form method="POST" action="/settings">
                        <?php include $this->resolve("partials/_csrf.php"); ?>
                            <div class="modal-body">
                                <div class="form-floating my-1">
                                    <input type="text" class="form-control" id="textInput" name="newCategoryIncomes" value="" required />
                                    <label for="textInput">Nazwa nowej kategorii</label>
                                </div>
                            </div>
                            <div class="w-50 mx-auto">
                                <?php foreach ($incomesCategories as $incomeCategory): ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="idCategoryIncomes" id="exampleRadios<?php echo e($incomeCategory['id']); ?>" value="<?php echo e($incomeCategory['id']); ?>">
                                        <label class="form-check-label" for="exampleRadios<?php echo e($incomeCategory['id']); ?>">
                                            <?php echo e($incomeCategory['name']); ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Ok
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div
                class="modal fade"
                id="editExpensesCategoryForm"
                tabindex="-1"
                aria-labelledby="editExpensesCategoryLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header position-relative" style="height: 100px;">
                            <h5 class="modal-title position-absolute start-50 top-50 translate-middle" id="editExpensesCategoryLabel">
                                Wybierz kategorię do edycji i podaj nową nazwę:
                            </h5>
                            <button
                                type="button"
                                class="btn-close position-absolute top-0 end-0 me-2 mt-2"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form method="POST" action="/settings">
                        <?php include $this->resolve("partials/_csrf.php"); ?>
                            <div class="modal-body">
                                <div class="form-floating my-1">
                                    <input type="text" class="form-control" id="textInput" name="newCategoryExpenses" value="" required />
                                    <label for="textInput">Nazwa nowej kategorii</label>
                                </div>
                            </div>
                            <div class="w-50 mx-auto">
                                <?php foreach ($expensesCategories as $expenseCategory): ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="idCategoryExpenses" id="exampleRadios<?php echo e($expenseCategory['id']); ?>" value="<?php echo e($expenseCategory['id']); ?>">
                                        <label class="form-check-label" for="exampleRadios<?php echo e($expenseCategory['id']); ?>">
                                            <?php echo e($expenseCategory['name']); ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Ok
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</main>
<?php include $this->resolve("partials/_footer.php") ?>