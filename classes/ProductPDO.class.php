<?php
include_once('Product.class.php');

class ProductPDO {

  private $connection;

  public function __construct( PDO $connection = null)
  {
    try {
      $this->connection = new PDO(
                      'mysql:host=localhost;dbname=products',
                      'root',
                      'root' );
      $this->connection->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
      );
    } catch (\Exception $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
  }

  public function insertProduct()
  {
    try {
      $sku = $_POST['sku'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      $category = $_POST['categoryName'];

      $stmt= $this->connection->prepare("INSERT INTO Product(sku, name, price, category)
        VALUES (:sku, :name, :price, :category)");

      $stmt->bindParam(':sku', $sku);
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':price', $price);
      $stmt->bindParam(':category', $category);
      $stmt->execute();
       
      header("Location: http://localhost:8888/scandiweb3/");

      }
      catch (\Exception $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
      }
  }

  public function addBook()
  {
    try {
      $sku = $_POST['sku'];
      $weight = $_POST['weight'];

      $stmt= $this->connection->prepare("INSERT INTO Book(sku, weight)
        VALUES (:sku, :weight)");

      $stmt->bindParam(':sku', $sku);
      $stmt->bindParam(':weight', $weight);
      $stmt->execute();
    }
    catch (\Exception $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
  }

  public function addDVD() 
  {
    try {
      $sku = $_POST['sku'];
      $size = $_POST['size'];

      $stmt= $this->connection->prepare("INSERT INTO Dvd(sku, size)
        VALUES (:sku, :size)");

      $stmt->bindParam(':sku', $sku);
      $stmt->bindParam(':size', $size);
      $stmt->execute();
    }
    catch (\Exception $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
  }
  
  public function addFurniture()
  {
    try {
      $sku = $_POST['sku'];
      $height = $_POST['height'];
      $width = $_POST['width'];
      $length = $_POST['length'];

      $stmt= $this->connection->prepare("INSERT INTO Furniture(sku, height, length, width)
        VALUES (:sku, :height, :length, :width)");

      $stmt->bindParam(':sku', $sku);
      $stmt->bindParam(':height', $height);
      $stmt->bindParam(':length', $length);
      $stmt->bindParam(':width', $width);
      $stmt->execute();
    }
    catch (\Exception $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
  } 

  public function getBooks() 
  {
    try {
      $sql = "SELECT P.sku, P.name, P.price, P.category, B.weight
      FROM Product P
      INNER JOIN Book B ON P.sku = B.sku;";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $books = $stmt->fetchAll(PDO::FETCH_FUNC, "Book::buildFromPdo");
      return $books;
    } catch (\Exception $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
   
  }
  
  public function getDVDs() 
  {
    try {
      $sql = "SELECT P.sku, P.name, P.price, P.category, D.size
      FROM Product P
      INNER JOIN Dvd D ON P.sku = D.sku;";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $dvds = $stmt->fetchAll(PDO::FETCH_FUNC, "DVD::buildFromPdo");
      return $dvds;
    } catch (\Exception $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
   
  }

  public function getFurniture() 
  {
    try {
      $sql = "SELECT P.sku, P.name, P.price,
      P.category, F.length, F.height, F.width
      FROM Product P
      INNER JOIN Furniture F ON P.sku = F.sku;";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $furniture = $stmt->fetchAll(PDO::FETCH_FUNC, "Furniture::buildFromPdo");
      return $furniture;
    } catch (\Exception $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
    
  }

  public function deleteProduct()
  {
    try {
      if(!empty($_POST['checkbox'])) {
        foreach($_POST['checkbox'] as $key => $value){
          $stmt = $this->connection->prepare("DELETE FROM Product WHERE sku = '$key'");
          $stmt->execute();
        }
      }
      header("Location: http://localhost:8888/scandiweb3/");
    } catch (\Exception $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
  }

}
