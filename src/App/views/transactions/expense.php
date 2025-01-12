<?php include $this->resolve("partials/_header.php") ?>
<main>
    <div class="container col-xxl-10 px-1 py-1">
        <div class="row d-flex flex-column flex-lg-row align-items-center">
            <div class="col-12 col-sm-6 col-lg-6 order-2">
                <img
                    src="../images/area_chart.svg"
                    class="d-block mx-lg-auto img-fluid"
                    alt="Account"
                    width="500"
                    height="500"
                    loading="lazy" />
            </div>
            <div class="container col-12 col-sm-12 col-lg-6">
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
                            value="<?php echo e($oldFormData['date'] ?? ''); ?>"
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
                            <option value=""><?php echo e($oldFormData['category'] ?? '-- Wybierz kategorię --'); ?></option>
                            <option value="wynagrodzenie">Wynagrodzenie</option>
                            <option value="odsetki bankowe">Odsetki bankowe</option>
                            <option value="sprzedaż na allegro">Sprzedaż na Allegro</option>
                            <option value="inne przychody">Inne przychody</option>
                        </select>
                        <label for="categorySelect">Kategoria</label>
                        <?php if (array_key_exists('category', $errors)) : ?>
                            <div class="mt-1 text-danger">
                                <?php echo e($errors['category'][0]); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-floating my-4">
                        <select id="categorySelect" class="form-control" name="payMethod">
                            <option value=""><?php echo e($oldFormData['payMethod'] ?? '-- Wybierz kategorię --'); ?></option>
                        </select>
                        <label for="categorySelect">Metoda płatności</label>
                        <?php if (array_key_exists('category', $errors)) : ?>
                            <div class="mt-1 text-danger">
                                <?php echo e($errors['category'][0]); ?>
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
                        <button class="btn btn-danger w-100 py-3 text-white" type="reset">Anuluj</button>
                        <button class="btn btn-success w-100 py-3 text-white" type="submit">Zatwierdź</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include $this->resolve("partials/_footer.php") ?>