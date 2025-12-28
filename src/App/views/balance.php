<?php include $this->resolve("partials/_header.php") ?>
<?php include $this->resolve("partials/_expense_chart.php") ?>
<main>
  <p class="d-flex justify-content-center">
    <a class="btn btn-success  mt-3" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
      Wybierz okres
    </a>
  </p>
  <div class="collapse text-center col-xxl-8 col-md-6 col-sm-12 mx-auto" id="collapseExample">
    <div class="card card-body mx-3">
      <form action="/balance" method="GET">
        <button type="submit" class="dropdown-item text-decoration-none text-dark active" name="currentMonth" value="currentMonth">Bieżący
          miesiąc</button>
        <button type="submit" class="dropdown-item text-decoration-none text-dark active" name="previousMonth" value="previousMonth">Poprzedni
          miesiąc</button>
        <button type="submit" class="dropdown-item text-decoration-none text-dark active" name="currentYear" value="currentYear">Bieżący
          rok</button>
        <a class="dropdown-item text-decoration-none text-dark active" data-bs-toggle="modal" data-bs-target="#exampleModal"
          href="#">Niestandardowy</a>
      </form>
    </div>
  </div>
  <h2 class="display-5 fw-bold text-white lh-1 mt-4 text-center mb-4">
    <?php echo e($selectedTitle); ?>
  </h2>
  <div
    class="row d-flex flex-column flex-lg-row justify-content-center align-items-center gap-4 row-cols-1 row-cols-md-1 row-cols-lg-3 mb-3 col-12 col-md-8 col-lg-12 mx-auto text-center">
    <div class="col">
      <div class="card mb-4 rounded-3 shadow-sm">
        <div class="card-header py-3">
          <h3 class="my-0 fw-normal">Przychody</h3>
        </div>
        <div class="card-body">
          <ul class="list-unstyled mt-1 mb-4">
            <?php foreach ($incomes as $income) : ?>
              <li class="fw-bold py-2"><?php echo e($income['category']); ?> : <?php echo e($income['amount']); ?></li>
              <li>
                <?php echo ($income['date_of_income']); ?> <?php echo e($income['income_comment']); ?>
              </li>
              <li class="d-inline-flex align-items-center">
                <a href="/income/<?php echo e($income['id']); ?>">
                  <img
                    class="pen"
                    src="../fonts/pen-solid.svg"
                    alt="pen"
                    height="15"
                    width="15" />
                </a>
                <form action="/income/<?php echo e($income['id']); ?>" method="POST">
                  <input type="hidden" name="_METHOD" value="DELETE">
                  <?php include $this->resolve("partials/_csrf.php"); ?>
                  <button type="submit" class="btn btn-link">
                    <img
                      class="trash"
                      src="../fonts/trash-can-solid.svg"
                      alt="trash"
                      height="15"
                      width="15" />
                  </button>
                </form>
              </li>
            <?php endforeach; ?>
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
            <?php foreach ($expenses as $expense) : ?>
              <li class="fw-bold py-2"><?php echo e($expense['category']); ?> : <?php echo e($expense['amount']); ?></li>
              <li>
                <?php echo ($expense['date_of_expense']); ?> <?php echo e($expense['expense_comment']); ?>
              </li>
              <li class="d-inline-flex align-items-center">
                <a href="/expense/<?php echo e($expense['id']); ?>">
                  <img
                    class="pen"
                    src="../fonts/pen-solid.svg"
                    alt="pen"
                    height="15"
                    width="15" />
                </a>
                <form action="/expense/<?php echo e($expense['id']); ?>" method="POST">
                  <input type="hidden" name="_METHOD" value="DELETE">
                  <?php include $this->resolve("partials/_csrf.php"); ?>
                  <button type="submit" class="btn btn-link">
                    <img
                      class="trash"
                      src="../fonts/trash-can-solid.svg"
                      alt="trash"
                      height="15"
                      width="15" />
                  </button>
                </form>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-center text-center">
    <div class="col-11 col-xxl-8 col-md-8 col-sm-11 mx-lg-auto">
      <div class="card mb-4 rounded-3 shadow-sm">
        <div class="card-body">
          <ul class="list-unstyled mt-1 mb-4">
            <li class="fw-bold py-2">Bilans: <?php echo e($balance); ?></li>
            <?php if ($balance > 0): ?>
              <li class="text-success fw-bold"> Gratulacje. Świetnie zarządzasz finansami! </li>
            <?php elseif ($balance == 0): ?>
              <li class="text-warning fw-bold"> Bilans wynosi zero - warto przemyśleć oszczędności. </li>
            <?php else: ?>
              <li class="text-danger fw-bold"> Ostrożnie! Przekroczyłeś budżet – czas na oszczędności </li>
            <?php endif; ?>
          </ul>
          <div class="card mt-4 border-primary">
            <div class="card-header bg-primary text-white">
              <i class="bi bi-robot me-2"></i> Rada Doradcy Finansowego (Gemini AI)
            </div>
            <div class="card-body" id="ai-advice-container">
              <div class="d-flex align-items-center text-muted">
                <div class="spinner-border spinner-border-sm me-2 text-primary" role="status"></div>
                <span>Analizowanie Twojego budżetu przez AI...</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="mx-auto col-11 col-xxl-8 col-md-8 col-sm-11">
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
        <form method="GET">
          <div class="modal-body">
            <p class="my-2">Zakres od:</p>
            <div class="form-floating my-1">
              <input type="date" class="form-control" id="dateInput" name="rangeFrom" required />
              <label for="dateInput">Data</label>
            </div>
            <p class="my-2">Zakres do:</p>
            <div class="form-floating my-1">
              <input type="date" class="form-control" id="dateInput" name="rangeTo" required />
              <label for="dateInput">Data</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              Close
            </button>
            <button type="submit" class="btn btn-primary" name="submitDate">
              Ok
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
<script src="/js/ai-advice.js"></script>
<?php include $this->resolve("partials/_footer.php") ?>