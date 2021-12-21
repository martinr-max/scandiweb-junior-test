<?php
ob_start();
include_once('../bootstrap.php');
include_once('../classes/ProductPDO.class.php');
include_once('../classes/Product.class.php');

//header starts

$title="Add Product";
$styleLink = 'add-product-form.css';
$styleLink2 = '../main.css';
$scriptUrl = 'add_product_func.js';

//header ends

$addProduct = new ProductPDO();
if(isset($_POST['submit'])) {
    $addProduct->insertProduct();
}

if(isset($_POST['submit']) && isset($_POST['weight']) )  {
  $addProduct->addBook();
}

if(isset($_POST['submit']) && isset($_POST['size']) )  {
  $addProduct->addDVD();
}

if(isset($_POST['submit'])
 && isset($_POST['length'])
 && isset($_POST['width'])
 && isset($_POST['height']))  
{
  $addProduct->addFurniture();
}

include_once('../header/header.php');?>

  <nav class="nav_bar">
    <h1> Add Product </h1>
          <div class="buttons">
            <input
             type='submit'
             name='submit'
             class='button add_button'
             value='Submit'
             form='product_form'>
            <input
             type='reset'
             id='cancelButton'
             class='button delete_button'
             value='Cancel'
             form='product_form'>
          </nav>
        </header>
        <form class="addProductForm" id="product_form" action="add.php" method="post" novalidate>
          <div class="form-group">
            <label for="SKU">SKU</label>
            <input class="form-control" id="sku" name="sku" required type="text" placeholder="SKU">
            <div class="invalid-feedback">
              Please add a SKU.
            </div>
          </div>
          <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" id="name" name="name" required type="text" placeholder="Name">
            <div class="invalid-feedback">
              Please add a product's name.
            </div>
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input class="form-control" id="price" name="price" step="0.01" required type="number" placeholder="Price">
            <div class="invalid-feedback">
              Please add a price in numbers.
            </div>
          </div>
          <div class="form-group">
            <label for="typeSwitcher">Type Switcher</label>
            <select required id="productType" name="categoryName"  class="categoryName form-select">
              <option  selected disabled value="" >Choose...</option>
              <option value="Dvd">DVD</option>
              <option value="Book">Book</option>
              <option value="Furniture">Furniture</option>
            </select>
            <div class="invalid-feedback">
              Please select a  type.
            </div>
          </div>
          <div id="card"></div>
        </form>
<?php include_once('../footer/footer.php'); ?>
