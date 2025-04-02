<?php include $this->resolve("partials/_header.php") ?>
<main>
    <div class="container col-xxl-10 px-1 py-1">
        <div class="row d-flex flex-column flex-lg-row align-items-center">
            <div class="col-11 col-sm-10 col-lg-6 order-2">
                <div class="col-md-12 mb-3 mt-4 pt-5">
                    <div class="h-100 p-4 border border-2 rounded-3 text-white">
                        <h3>Limit wydatków dla kategorii</h3>
                        <p id="limit-info">Wybierz kategorię</p>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="h-100 p-4 border border-2 rounded-3 text-white">
                        <h3>Suma wydatków w wybranym miesiącu</h3>
                        <p id="limit-value">Wybierz kategorię i datę</p>
                    </div>
                </div>
                <div class="col-md-12 mb-5">
                    <div class="h-100 p-4 border border-2 rounded-3 text-white">
                        <h3>Pozostały limit po operacji</h3>
                        <p id="cash-left">Wybierz, kategorię, datę i kwotę </p>
                    </div>
                </div>
            </div>
            <div class="container col-11 col-sm-12 col-lg-6">
                <form action="/expense" method="POST" class="w-100">
                    <?php include $this->resolve("partials/_csrf.php"); ?>
                    <h2 class="h1 mb-3 fw-bold text-white">Wprowadź wydatek</h2>
                    <div class="form-floating my-4">
                        <input
                            value="<?php echo e($oldFormData['amount'] ?? ''); ?>"
                            name="amount"
                            type="number"
                            class="form-control"
                            id="floating-input-expense"
                            placeholder="Wprowadź kwotę" />
                        <label for="floating-input-expense">Kwota</label>
                        <?php if (array_key_exists('amount', $errors)) : ?>
                            <div class="mt-1 text-danger">
                                <?php echo e($errors['amount'][0]); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-floating my-4">
                        <input
                            value="<?php echo e($oldFormData['date'] ?? date('Y-m-d')); ?>"
                            name="date"
                            type="date"
                            class="form-control"
                            id="date-input-expense" />
                        <label for="date-input-expense">Data</label>
                        <?php if (array_key_exists('date', $errors)) : ?>
                            <div class="mt-1 text-danger">
                                <?php echo e($errors['date'][0]); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-floating my-4">
                        <select name="category" id="category-select-expense" class="form-control">
                            <option value="<?php echo e($oldFormData['category'] ?? ''); ?>"><?php echo e($oldFormData['category'] ?? '-- Wybierz kategorię --'); ?></option>
                            <?php foreach ($expensesCategories as $expenseCategory) {
                                echo '<option value="' . ($expenseCategory['name']) . '">' . $expenseCategory['name'] . '</option>';
                            } ?>
                        </select>
                        <label for="category-select-expense">Kategoria</label>
                        <?php if (array_key_exists('category', $errors)) : ?>
                            <div class="mt-1 text-danger">
                                <?php echo e($errors['category'][0]); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-floating my-4">
                        <select id="pay-method-select-expense" class="form-control" name="payMethod">
                            < <option value="<?php echo e($oldFormData['payMethod'] ?? ''); ?>"><?php echo e($oldFormData['payMethod'] ?? '-- Wybierz kategorię --'); ?></option>
                                <?php foreach ($expensesPayments as $expensesPayment) {
                                    echo '<option value="' . ($expensesPayment['name']) . '">' . $expensesPayment['name'] . '</option>';
                                } ?>
                        </select>
                        <label for="pay-method-select-expense">Metoda płatności</label>
                        <?php if (array_key_exists('payMethod', $errors)) : ?>
                            <div class="mt-1 text-danger">
                                <?php echo e($errors['payMethod'][0]); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-floating my-4">
                        <input
                            value="<?php echo e($oldFormData['comment'] ?? ''); ?>"
                            name="comment"
                            type="text"
                            class="form-control"
                            id="comment-input-expense"
                            placeholder="Komentarz" />
                        <label for="comment-input-expense">Komentarz</label>
                        <?php if (array_key_exists('comment', $errors)) : ?>
                            <div class="mt-1 text-danger">
                                <?php echo e($errors['comment'][0]); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="container d-flex gap-5 px-0">
                        <a href="/" class="btn btn-danger w-100 py-3 text-white">Anuluj</a>
                        <button class="btn btn-success w-100 py-3 text-white" type="submit">Zatwierdź</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include $this->resolve("partials/_footer.php") ?>