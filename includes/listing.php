<?php


$results = '';
$i = 1;
foreach ($products as $product) {
  if ($i == 1 || ($i - 1) % 3 == 0) {
    $results .= '<div class="row mt-2">';
  }
  $results .= '<div class="col">
                    <div class="card h-100">
                        <div class="card-body ">
                            <h3 class="card-title">' . $product->getId() . '</h3>
                            <h5 class="card-subtitle mb-2 text-body-primary">' . $product->getName() . '</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">' . $product->getDescription() . '</h6>
                              <a href="#" class="card-link link-offset-1  mt-5" id="'.$product->getId().'">See more</a>
                           
                        </div>
                    </div>
                </div>';
  if ($i == count($products) || $i % 3 == 0) {
    $results .= '</div>';
  }
  $i++;
}
?>
<script src="src\scripts\scripts.js"></script>

<section class="p-4">
  <a href="register.php">
    <button class="btn btn-primary">Register a new product</button>
  </a>
  <table class="table bg-light mt-3 ">
    <?= $results ?>

  </table>

</section>


<div class="modal fade" tabindex="-1" id="productModal" >
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content" >
      <div class="modal-header">
        <h1 class="modal-title display-4 product-title">Product title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p class="display-6 fs-5" id="product-description">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque pariatur </p>
      <h3 class="display-6 fs-4" id="product-attributes"></h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="delete">Delete</button>
        <a href="edit.php?id=" id="update"><button type="button" class="btn btn-primary">Update</button></a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" id="confirmDeleteModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Do you really want to delete this product?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h1 class=" display-6 product-title">PRODUCT NAME</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmDelete">DELETE</button>
      </div>
    </div>
  </div>
</div>