<?php include $this->resolve("partials/_header.php") ?>
<main class="d-flex flex-column align-items-center justify-content-center h-50">
  <div class="display-5 fw-bold mb-5 text-center mt-5 text-success">Witaj!! <?php echo e($userName); ?></div>
  <div class="col-lg-6 text-center">
    <p class="lead text-white fs-5"> 
      Zarządzaj swoimi finansami w prosty sposób:
    </p>
    <ul class="list-unstyled text-white fs-5">
      <li>Dodaj przychód: Śledź swoje wpływy.</li>
      <li>Dodaj wydatek: Kontroluj swoje wydatki.</li>
      <li>Przeglądaj bilans: Sprawdzaj, jak wygląda Twój budżet.</li>
    </ul>
    <p class="lead text-white fs-5">
      Twoje finanse pod pełną kontrolą! 🚀
    </p>
  </div>
</main>
<div class="container">
  <?php include $this->resolve("partials/_footer.php") ?>