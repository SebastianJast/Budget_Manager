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
                <form class="w-100">
                    <h2 class="h1 mb-3 fw-bold text-white">Wprowadź wydatek</h2>
                    <div class="form-floating my-4">
                        <input
                            type="number"
                            class="form-control"
                            id="floatingInput"
                            placeholder="Wprowadź kwotę"
                            required />
                        <label for="floatingInput">Kwota</label>
                    </div>
                    <div class="form-floating my-4">
                        <input
                            type="date"
                            class="form-control"
                            id="dateInput"
                            required />
                        <label for="dateInput">Data</label>
                    </div>
                    <div class="form-floating my-4">
                        <select id="categorySelect" class="form-control" required>
                            <option value="">-- Wybierz kategorię --</option>
                            <option value="wynagrodzenie">Wynagrodzenie</option>
                            <option value="odsetki bankowe">Odsetki bankowe</option>
                            <option value="sprzedaż na allegro">Sprzedaż na Allegro</option>
                            <option value="inne przychody">Inne przychody</option>
                        </select>
                        <label for="categorySelect">Kategoria</label>
                    </div>
                    <div class="form-floating my-4">
                        <input
                            type="text"
                            class="form-control"
                            id="commentInput"
                            placeholder="Komentarz" />
                        <label for="commentInput">Komentarz</label>
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