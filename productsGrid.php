<?php

foreach($products as $product) { ?>
  <div id="product_card">
    <input
      class='form-check-input delete-checkbox'
      name='checkbox[<?php echo $product->getSKU() ?>]'
      type='checkbox' 
      value=<?php echo $product->getSKU(); ?>/>
    <p> <?php echo $product->getSKU(); ?> </p>
    <p> <?php echo $product->getName(); ?> </p>
    <p> $ <?php echo $product->getPrice();  ?> </p>
    <?php if(get_class($product) == "DVD"): ?>
            <p> Size: <?php echo $product->getSize();  ?> </p>
    <?php elseif(get_class($product) == "Book"): ?>
            <p> Weight: <?php echo $product->getWeight();  ?> </p>
    <?php elseif(get_class($product) == "Furniture"): ?>
            <p> Dimentions: <?php echo $product->getHeight();?> x
                            <?php echo $product->getLength(); ?> x
                            <?php echo $product->getWidth(); ?>
            </p>
    <?php endif ?>
  </div>
  <?php }



