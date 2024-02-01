<?php
    $resultado = $_GET['marca'];
    include './funciones/funciones.php';
    include './templates/header.php';
?>

<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
    <?php $contactos = buscarMarca($resultado); 
          if($contactos->num_rows) {
            foreach($contactos as $contacto) { ?>
    <div class="col">
      <div class="card mb-4 rounded-3 shadow-sm hover-card">
        <div class="card-header py-3">
          <h4 class="my-0 fw-normal">
            <a href="resultados.php?marca=<?php echo urlencode($contacto['marca']); ?>" class="card-link no-underline">
              <?php echo $contacto['marca']; ?>
            </a>
          </h4>
        </div>
      </div>
    </div>
    <?php } } ?>
  </div>


<?php include './templates/footer.php'; ?>