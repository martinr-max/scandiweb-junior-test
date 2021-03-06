<?php
interface ProductInterface
{
  public function getName();
  public function getSKU();
  public function getPrice();
}

class Book implements ProductInterface
{
  public $weight;
  
  public function buildFromPdo( $sku, $name, $price, $category, $weight=null)
  {
    $product = new self;
    $product->sku = $sku;
    $product->name = $name;
    $product->price = $price;
    $product->category = $category;
    $product->weight = $weight;
    return $product;
  }

  public function getSKU() 
  {
    return $this->sku;
  }

  public function getName() 
  {
    return $this->name;
  }

  public function getPrice() 
  {
    return $this->price;
  }

  public function getWeight() 
  {
    return $this->weight;
  }
}

class DVD  implements ProductInterface
{
  public $size;
  public function buildFromPdo($sku, $name, $price, $category, $size=null)
  {
    $product = new self;
    $product->sku = $sku;
    $product->name = $name;
    $product->price = $price;
    $product->category = $category;
    $product->size = $size;
    return $product;
  }

  public function getName() 
  {
    return $this->name;
  }

  public function getSKU() 
  {
    return $this->sku;
  }

  public function getPrice() 
  {
    return $this->price;
  }

  public function getSize() 
  {
    return $this->size;
  }
}

class Furniture implements ProductInterface
{
  public $height;
  public $length;
  public $width;

  public function buildFromPdo($sku, $name, $price,
   $category, $height = null, $length = null, $width = null)
  {
    $product = new self;
    $product->sku = $sku;
    $product->name = $name;
    $product->price = $price;
    $product->category = $category;
    $product->height = $height;
    $product->length = $length;
    $product->width = $width;
    return $product;
  }
 
  public function getName() 
  {
    return $this->name;
  }

  public function getSKU() 
  {
    return $this->sku;
  }

  public function getPrice() 
  {
    return $this->price;
  }

  public function getHeight() 
  {
    return $this->height;
  }

  public function getLength() 
  {
    return $this->length;
  }

  public function getWidth() 
  {
    return $this->width;
  }
}
