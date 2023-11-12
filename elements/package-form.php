<?php
global $DB;
$branchCode = isset($_GET['branchcode']) ? $_GET['branchcode'] : '';
$packageQuery = "SELECT package.packCode, package.packName, category.categoryName, service.seviceName, service.Description, service.quantity, service.color, service.price
FROM package
JOIN category ON package.packCode = category.packCode
JOIN service ON category.categoryCode = service.categoryCode
WHERE package.branchCode = $branchCode;";
$packageResult = $DB->query($packageQuery);
?>

<?php if ($packageResult->num_rows > 0): ?>
  <div class="package-details" id="packageDetails<?= $branchCode ?>" style="display: block;">
    <div class="d-flex align-items-center" style="height: 200px; margin-top:300px; margin-left: 400px; width: 150%;">
      <div class="package-details col-5 card py-5 mx-4 px-4">
        <h2>Pre-made Packages</h2>
        <h6>This section lets you create pre-made packages for your customers.</h6>
        <div class="accordion" id="accordionFlushExample">
          <?php
          $currentPackageCode = null;
          $totalPrice = 0; // Initialize total price variable

          while ($row = $packageResult->fetch_assoc()) {
            // Check if the package code has changed
            if ($row['packCode'] !== $currentPackageCode) {
              // If yes, start a new accordion item
              if ($currentPackageCode !== null) {
                // Close the previous accordion item if it's not the first one
                echo '</tbody></table>';
                echo '<div class="text-end"><strong>Total:</strong></div>';
                echo '<div class="text-end">' . $totalPrice . '</div>';
                echo '<div class="m-3">
                        <a href="#" class="btn-edit btn-lg mt-4">
                          <i class="bi bi-plus-square"></i>
                          <span>Add Item</span>
                        </a>
                      </div>';
                echo '</div></div></div>';
              }
              // Start a new accordion item
              echo '<div class="accordion-item" id="accordionItem' . $row['packCode'] . '">
                      <h2 class="accordion-header" id="flush-heading' . $row['packCode'] . '">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse' . $row['packCode'] . '" aria-expanded="false" aria-controls="flush-collapse' . $row['packCode'] . '">
                          ' . $row['packName'] . '
                        </button>
                      </h2>
                      <div id="flush-collapse' . $row['packCode'] . '" class="accordion-collapse collapse" aria-labelledby="flush-heading' . $row['packCode'] . '" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                          <table class="table table-hover table-responsive">
                            <thead>
                              <tr>
                                <th scope="col">Category</th>
                                <th scope="col">Service</th>
                                <th scope="col">Description</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Color</th>
                                <th scope="col">Price</th>
                              </tr>
                            </thead>
                            <tbody>';
              // Set the current package code to the current row's package code
              $currentPackageCode = $row['packCode'];
              $totalPrice = 0; // Reset total price for the new package
            }

            // Display the category details for the current package
            echo '<tr>
                    <td>' . $row['categoryName'] . '</td>
                    <td>' . $row['seviceName'] . '</td>
                    <td>' . $row['Description'] . '</td>
                    <td>' . $row['quantity'] . '</td>
                    <td>' . $row['color'] . '</td>
                    <td>' . ($row['price'] * $row['quantity']) . '</td>
                  </tr>';

            // Update the total price for the current package
            $totalPrice += $row['price'] * $row['quantity'];
          }

          // Close the last accordion item
          if ($currentPackageCode !== null) {
            echo '</tbody></table>';
            echo '<div class="text-end"><strong>Total:</strong></div>';
            echo '<div class="text-end">' . $totalPrice . '</div>';
            echo '<div class="m-3">
                    <a href="#" class="btn-edit btn-lg mt-4">
                      <i class="bi bi-plus-square"></i>
                      <span>Add Item</span>
                    </a>
                  </div>';
            echo '</div></div></div>';
          }
          ?>
          <!-- Add Package button outside the loop -->
          <div class="m-3">
          <a href="?page=add_package" class="btn-edit btn-lg mt-4">
                    <i class="bi bi-plus-square"></i>
                    <span>Add Package</span>
                </a>
          </div>
        </div>
      </div>
    </div>
  </div>


  
<?php endif; ?>