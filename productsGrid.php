<?php

foreach($books as $book) { ?>
  <div id="product_card">
    <input
      class='form-check-input delete-checkbox'
      name='checkbox[<?php echo $book->getSKU() ?>]'
      type='checkbox' 
      value=<?php echo $book->getSKU(); ?>/>
    <p> <?php echo $book->getSKU(); ?> </p>
    <p> <?php echo $book->getName(); ?> </p>
    <p> $ <?php echo $book->getPrice();  ?> </p>
    <p>Weight:<?php echo $book->getWeight();  ?> </p>
  </div>
  <?php }

foreach($dvds as $dvd) { ?>
        <div id="product_card">
          <input
            class='form-check-input delete-checkbox'
            name='checkbox[<?php echo $dvd->getSKU() ?>]'
            type='checkbox' 
            value=<?php echo $dvd->getSKU(); ?>/>
          <p> <?php echo $dvd->getSKU(); ?> </p>
          <p> <?php echo $dvd->getName(); ?> </p>
          <p> $ <?php echo $dvd->getPrice();  ?> </p>
          <p>Size:<?php echo $dvd->getSize();  ?> </p>
        </div>
        <?php }

foreach($furniture as $furn) { ?>
        <div id="product_card">
          <input
            class='form-check-input delete-checkbox'
            name='checkbox[<?php echo $furn->getSKU() ?>]'
            type='checkbox' 
            value=<?php echo $furn->getSKU(); ?>/>
          <p> <?php echo $furn->getSKU(); ?> </p>
          <p> <?php echo $furn->getName(); ?> </p>
          <p> $ <?php echo $furn->getPrice();  ?> </p>
          <p>Dimentions:<?php echo $furn->getHeight();?> 
          X <?php echo $furn->getWidth();?> 
          X <?php echo $furn->getLength();?>
         </p>
        </div>
        <?php }
      



