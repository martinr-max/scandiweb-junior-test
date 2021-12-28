<?php
ob_start();

include_once('bootstrap.php');
include_once('classes/Product.class.php');
include_once('classes/ProductPDO.class.php');

//header starts

$title = 'Products list';
$styleLink = "main.css";
$styleLink2 = "";
$scriptUrl = 'index.js';

//Header ends
$productsFetch = new ProductPDO();
//$products = $productsFetch->getProducts();
$books = $productsFetch->getBooks();
$dvds = $productsFetch->getDVDs();
$furniture = $productsFetch->getFurniture();

if(isset($_POST['delete']) && isset($_POST['checkbox'])) {
  $productsFetch->deleteProduct();
}

include_once('header/header.php'); ?>
<nav class="nav_bar">
  <h1> Product list </h1>
        <div class="buttons">
        <input
         type='button'
         value='Add'
         id='addButton'
         class='button add_button'/>
        <input
         name='delete'
         form='productsList'
         type='submit'
         class='button delete_button'
         value='Mass Delete'/>
        </div>
      </nav>
      <section>
        <form  name="productsList" method="post" id="productsList">
          <?php include_once('productsGrid.php'); ?>
        </div>
      </form>
    </section>
<?php include_once('footer/footer.php');  ?>
