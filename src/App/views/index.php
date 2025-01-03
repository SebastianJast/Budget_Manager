<?php include $this->resolve("partials/_header.php") ?>
<main>
  <p class="d-flex justify-content-center">
    <a class="btn btn-success  mt-3" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
      Wybierz okres
    </a>
  </p>
  <div class="collapse text-center col-xxl-8 col-md-6 col-sm-12 mx-auto" id="collapseExample">
    <div class="card card-body">
      <a class="text-decoration-none text-dark active" href="#">Bieżący miesiąc</a>
      <a class="text-decoration-none text-dark active" href="#">Poprzedni miesiąc</a>
      <a class="text-decoration-none text-dark active" href="#">Bieżący rok</a>
      <a
        class="text-decoration-none text-dark active"
        data-bs-toggle="modal"
        data-bs-target="#exampleModal"
        href="#">Niestandardowy</a>
    </div>
  </div>
  <h2 class="display-5 fw-bold text-white lh-1 mt-4 text-center mb-4">
    Bieżacy miesiąc
  </h2>
  <div
    class="row d-flex flex-column flex-lg-row justify-content-center align-items-center gap-4 row-cols-1 row-cols-md-3 mb-3 text-center">
    <div class="col">
      <div class="card mb-4 rounded-3 shadow-sm">
        <div class="card-header py-3">
          <h3 class="my-0 fw-normal">Przychody</h3>
        </div>
        <div class="card-body">
          <ul class="list-unstyled mt-1 mb-4">
            <li class="fw-bold py-2">Wynagrodzenie: 5000</li>
            <li>
              2024-09-28 5000 wypłata
              <span><img
                  class="pen"
                  src="../fonts/pen-solid.svg"
                  alt="pen"
                  height="15"
                  width="15" /></span><span><img
                  class="trash"
                  src="../fonts/trash-can-solid.svg"
                  alt="trash"
                  height="15"
                  width="15" /></span>
            </li>
            <li class="fw-bold py-2">Sprzedaż na Allegro: 2000</li>
            <li>
              2024-09-28 2000 Rower
              <span><img
                  class="pen"
                  src="../fonts/pen-solid.svg"
                  alt="pen"
                  height="15"
                  width="15" /></span><span><img
                  class="trash"
                  src="../fonts/trash-can-solid.svg"
                  alt="trash"
                  height="15"
                  width="15" /></span>
            </li>
            <li class="fw-bold py-2">Odsetki bankowe: 300</li>
            <li>
              2024-09-28 300 lokata
              <span><img
                  class="pen"
                  src="../fonts/pen-solid.svg"
                  alt="pen"
                  height="15"
                  width="15" /></span><span><img
                  class="trash"
                  src="../fonts/trash-can-solid.svg"
                  alt="trash"
                  height="15"
                  width="15" /></span>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card mb-4 rounded-3 shadow-sm">
        <div class="card-header py-3">
          <h3 class="my-0 fw-normal">Wydatki</h3>
        </div>
        <div class="card-body">
          <ul class="list-unstyled mt-1 mb-4">
            <li class="fw-bold py-2">Ubranie: 500</li>
            <li>
              2024-09-28 500 kurtka zimowa
              <span><img
                  class="pen"
                  src="../fonts/pen-solid.svg"
                  alt="pen"
                  height="15"
                  width="15" /></span><span><img
                  class="trash"
                  src="../fonts/trash-can-solid.svg"
                  alt="trash"
                  height="15"
                  width="15" /></span>
            </li>
            <li class="fw-bold py-2">Wycieczka: 400</li>
            <li>
              2024-09-28 400
              <span><img
                  class="pen"
                  src="../fonts/pen-solid.svg"
                  alt="pen"
                  height="15"
                  width="15" /></span><span><img
                  class="trash"
                  src="../fonts/trash-can-solid.svg"
                  alt="trash"
                  height="15"
                  width="15" /></span>
            </li>
            <li class="fw-bold py-2">Jedzenie: 300</li>
            <li>
              2024-09-28 300
              <span><img
                  class="pen"
                  src="../fonts/pen-solid.svg"
                  alt="pen"
                  height="15"
                  width="15" /></span><span><img
                  class="trash"
                  src="../fonts/trash-can-solid.svg"
                  alt="trash"
                  height="15"
                  width="15" /></span>
            </li>
            <li class="fw-bold py-2">Rozrywka: 200</li>
            <li>
              2024-09-28 200 Wyjazd na narty
              <span><img
                  class="pen"
                  src="../fonts/pen-solid.svg"
                  alt="pen"
                  height="15"
                  width="15" /></span><span><img
                  class="trash"
                  src="../fonts/trash-can-solid.svg"
                  alt="trash"
                  height="15"
                  width="15" /></span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-center text-center">
    <div class="col-xxl-8 col-md-8 col-sm-12 mx-lg-auto">
      <div class="card mb-4 rounded-3 shadow-sm">
        <div class="card-body">
          <ul class="list-unstyled mt-1 mb-4">
            <li class="fw-bold py-2">Bilans: 5900</li>
            <li class="text-success fw-bold">
              Gratulacje. Świetnie zarządzasz finansami!
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="mx-auto col-xxl-8 col-md-8 col-sm-12">
    <div id="chartContainer" style="height: 300px; width: 100%"></div>
  </div>
  <div
    class="modal fade"
    id="exampleModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            Wybierz zakres dat:
          </h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="my-2">Zakres od:</p>
          <div class="form-floating my-1">
            <input
              type="date"
              class="form-control"
              id="dateInput"
              required />
            <label for="dateInput">Data</label>
          </div>
          <p class="my-2">Zakres do:</p>
          <div class="form-floating my-1">
            <input
              type="date"
              class="form-control"
              id="dateInput"
              required />
            <label for="dateInput">Data</label>
          </div>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-dismiss="modal">
            Close
          </button>
          <button type="button" class="btn btn-primary">Ok</button>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include $this->resolve("partials/_footer.php") ?>