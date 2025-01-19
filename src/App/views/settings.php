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
                    <a class="dropdown-item text-decoration-none text-dark active" data-bs-toggle="modal" data-bs-target="#editPaymentMethodsForm"
                        href="#">Sposoby płatności</a>
                </div>
                <div class="card-header py-3">
                    <p class="my-0 fw-normal">Dodanie nowej kategorii</p>
                </div>
                <div class="card-body d-flex">
                    <a class="dropdown-item text-decoration-none text-dark active" data-bs-toggle="modal" data-bs-target="#addIncomesCategoryForm"
                        href="#">Przychody</a>
                    <a class="dropdown-item text-decoration-none text-dark active" data-bs-toggle="modal" data-bs-target="#addExpensesCategoryForm"
                        href="#">Wydatki</a>
                    <a class="dropdown-item text-decoration-none text-dark active" data-bs-toggle="modal" data-bs-target="#addPaymentMethods"
                        href="#">Sposoby płatności</a>
                </div>
                <div class="card-header py-3">
                    <p class="my-0 fw-normal">Usuwanie kategorii</p>
                </div>
                <div class="card-body d-flex">
                    <a class="dropdown-item text-decoration-none text-dark active" data-bs-toggle="modal" data-bs-target="#deleteIncomesCategoryForm"
                        href="#">Przychody</a>
                    <a class="dropdown-item text-decoration-none text-dark active" data-bs-toggle="modal" data-bs-target="#deleteExpensesCategoryForm"
                        href="#">Wydatki</a>
                    <a class="dropdown-item text-decoration-none text-dark active" data-bs-toggle="modal" data-bs-target="#deletePaymentMethods"
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
            <!-- editIncomesCategoryForm -->
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
            <!-- editExpensesCategoryForm -->
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
            <!-- editPaymentMethodsForm -->
            <div
                class="modal fade"
                id="editPaymentMethodsForm"
                tabindex="-1"
                aria-labelledby="editPaymentMethodsLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header position-relative" style="height: 100px;">
                            <h5 class="modal-title position-absolute start-50 top-50 translate-middle" id="editPaymentMethodsLabel">
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
                                    <input type="text" class="form-control" id="textInput" name="newPaymentMethod" value="" required />
                                    <label for="textInput">Nazwa nowej kategorii</label>
                                </div>
                            </div>
                            <div class="w-50 mx-auto">
                                <?php foreach ($expensesPayments as $expensesPayment): ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="idPayment" id="exampleRadios<?php echo e($expensesPayment['id']); ?>" value="<?php echo e($expensesPayment['id']); ?>">
                                        <label class="form-check-label" for="exampleRadios<?php echo e($expensesPayment['id']); ?>">
                                            <?php echo e($expensesPayment['name']); ?>
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
            <!-- addIncomesCategoryForm -->
            <div
                class="modal fade"
                id="addIncomesCategoryForm"
                tabindex="-1"
                aria-labelledby="addIncomesCategoryLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header position-relative" style="height: 100px;">
                            <h5 class="modal-title position-absolute start-50 top-50 translate-middle" id="addIncomesCategoryLabel">
                                Podaj nazwę nowej kategorii:
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
                                    <input type="text" class="form-control" id="textInput" name="addIncomeCategory" value="" required />
                                    <label for="textInput">Nazwa nowej kategorii</label>
                                </div>
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
            <!-- addExpensesCategoryForm -->
            <div
                class="modal fade"
                id="addExpensesCategoryForm"
                tabindex="-1"
                aria-labelledby="addExpensesCategoryLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header position-relative" style="height: 100px;">
                            <h5 class="modal-title position-absolute start-50 top-50 translate-middle" id="addExpensesCategoryLabel">
                                Podaj nazwę nowej kategorii:
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
                                    <input type="text" class="form-control" id="textInput" name="addExpenseCategory" value="" required />
                                    <label for="textInput">Nazwa nowej kategorii</label>
                                </div>
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
            <!-- addPaymentMethods -->
            <div
                class="modal fade"
                id="addPaymentMethods"
                tabindex="-1"
                aria-labelledby="addPaymentMethodsLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header position-relative" style="height: 100px;">
                            <h5 class="modal-title position-absolute start-50 top-50 translate-middle" id="addPaymentMethodsLabel">
                                Podaj nazwę nowej kategorii:
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
                                    <input type="text" class="form-control" id="textInput" name="addPaymentMethod" value="" required />
                                    <label for="textInput">Nazwa nowej kategorii</label>
                                </div>
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
            <!-- deleteIncomesCategoryForm -->
            <div
                class="modal fade"
                id="deleteIncomesCategoryForm"
                tabindex="-1"
                aria-labelledby="deleteIncomesCategoryLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header position-relative" style="height: 100px;">
                            <h5 class="modal-title position-absolute start-50 top-50 translate-middle" id="deleteIncomesCategoryLabel">
                                Wybierz kategorię do usunięcia:
                            </h5>
                            <button
                                type="button"
                                class="btn-close position-absolute top-0 end-0 me-2 mt-2"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form method="POST" action="/settings">
                            <?php include $this->resolve("partials/_csrf.php"); ?>
                            <div class="w-50 mx-auto">
                                <?php foreach ($incomesCategories as $incomeCategory): ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="deleteIncomeCategory" id="exampleRadios<?php echo e($incomeCategory['id']); ?>" value="<?php echo e($incomeCategory['id']); ?>">
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
            <!-- deleteExpensesCategoryForm -->
            <div
                class="modal fade"
                id="deleteExpensesCategoryForm"
                tabindex="-1"
                aria-labelledby="deleteIncomesCategoryLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header position-relative" style="height: 100px;">
                            <h5 class="modal-title position-absolute start-50 top-50 translate-middle" id="deleteExpensesCategoryLabel">
                                Wybierz kategorię do usunięcia:
                            </h5>
                            <button
                                type="button"
                                class="btn-close position-absolute top-0 end-0 me-2 mt-2"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form method="POST" action="/settings">
                            <?php include $this->resolve("partials/_csrf.php"); ?>
                            <div class="w-50 mx-auto">
                                <?php foreach ($expensesCategories as $expenseCategory): ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="deleteExpenseCategory" id="exampleRadios<?php echo e($expenseCategory['id']); ?>" value="<?php echo e($expenseCategory['id']); ?>">
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
            <!-- deletePaymentMethods -->
            <div
                class="modal fade"
                id="deletePaymentMethods"
                tabindex="-1"
                aria-labelledby="deletePaymentMethodsLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header position-relative" style="height: 100px;">
                            <h5 class="modal-title position-absolute start-50 top-50 translate-middle" id="deletePaymentMethodsLabel">
                                Wybierz kategorię do usunięcia:
                            </h5>
                            <button
                                type="button"
                                class="btn-close position-absolute top-0 end-0 me-2 mt-2"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form method="POST" action="/settings">
                            <?php include $this->resolve("partials/_csrf.php"); ?>
                            <div class="w-50 mx-auto">
                                <?php foreach ($expensesPayments as $expensesPayment): ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="deletePaymentMethod" id="exampleRadios<?php echo e($expensesPayment['id']); ?>" value="<?php echo e($expensesPayment['id']); ?>">
                                        <label class="form-check-label" for="exampleRadios<?php echo e($expensesPayment['id']); ?>">
                                            <?php echo e($expensesPayment['name']); ?>
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