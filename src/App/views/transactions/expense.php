<?php include $this->resolve("partials/_header.php") ?>
<main>
    <div class="container col-xxl-10 px-1 py-1">
        <div class="row d-flex flex-column flex-lg-row align-items-center">
            <div class="col-11 col-sm-10 col-lg-6 order-2">
                <div class="col-md-12 mb-3 mt-4 pt-5">
                    <div class="h-100 p-4 border border-2 rounded-3 text-white">
                        <h3>Informacja o limicie</h3>
                        <p>Wybierz kategorię</p>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="h-100 p-4 border border-2 rounded-3 text-white">
                        <h3>Wartość wydatków</h3>
                        <p id="limit-value">Wybierz kategorię i datę</p>
                    </div>
                </div>
                <div class="col-md-12 mb-5">
                    <div class="h-100 p-4 border border-2 rounded-3 text-white">
                        <h3>Pozostała gotówka</h3>
                        <p>Wybierz, kategorię, datę i kwotę </p>
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
                            id="floatingInput"
                            placeholder="Wprowadź kwotę" />
                        <label for="floatingInput">Kwota</label>
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
                            id="dateInput" />
                        <label for="dateInput">Data</label>
                        <?php if (array_key_exists('date', $errors)) : ?>
                            <div class="mt-1 text-danger">
                                <?php echo e($errors['date'][0]); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-floating my-4">
                        <select name="category" id="categorySelect" class="form-control">
                            <option value="<?php echo e($oldFormData['category'] ?? ''); ?>"><?php echo e($oldFormData['category'] ?? '-- Wybierz kategorię --'); ?></option>
                            <?php foreach ($expensesCategories as $expenseCategory) {
                                echo '<option value="' . ($expenseCategory['name']) . '">' . $expenseCategory['name'] . '</option>';
                            } ?>
                        </select>
                        <label for="categorySelect">Kategoria</label>
                        <?php if (array_key_exists('category', $errors)) : ?>
                            <div class="mt-1 text-danger">
                                <?php echo e($errors['category'][0]); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-floating my-4">
                        <select id="payMethodSelect" class="form-control" name="payMethod">
                            < <option value="<?php echo e($oldFormData['payMethod'] ?? ''); ?>"><?php echo e($oldFormData['payMethod'] ?? '-- Wybierz kategorię --'); ?></option>
                                <?php foreach ($expensesPayments as $expensesPayment) {
                                    echo '<option value="' . ($expensesPayment['name']) . '">' . $expensesPayment['name'] . '</option>';
                                } ?>
                        </select>
                        <label for="payMethodSelect">Metoda płatności</label>
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
                            id="commentInput"
                            placeholder="Komentarz" />
                        <label for="commentInput">Komentarz</label>
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