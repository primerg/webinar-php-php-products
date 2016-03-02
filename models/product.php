<?php
  class Product {
    
    public $id;
    public $name;
    public $summary;
    public $description;
    public $list_price;
    public $sale_price;
    public $stock;
    public $status;
    public $image;

    public function __construct($data = []) {
      foreach ($data as $key => $value) {
        $this->{$key} = $value;
      }
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM products');

      foreach($req->fetchAll() as $product) {
        $list[] = new Product($product);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM products WHERE id = :id');

      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();

      if ($post) {
        return new Product($post);  
      }

      return false;
    }

    public static function add($product) {
      $sql = "INSERT INTO products(name,
            summary,
            description,
            list_price,
            sale_price,
            stock,
            status,
            image) VALUES (
            :name, 
            :summary, 
            :description,
            :list_price,
            :sale_price,
            :stock,
            :status,
            :image)";
                            
      try {
        $db = Db::getInstance();
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':name', $product['name'], PDO::PARAM_STR);
        $stmt->bindParam(':description', $product['description'], PDO::PARAM_STR);
        $stmt->bindParam(':summary', $product['summary'], PDO::PARAM_STR);
        $stmt->bindParam(':list_price', $product['list_price'], PDO::PARAM_STR);
        $stmt->bindParam(':sale_price', $product['sale_price'], PDO::PARAM_STR);
        $stmt->bindParam(':stock', $product['stock'], PDO::PARAM_INT);
        $stmt->bindParam(':status', $product['status'], PDO::PARAM_INT);
        $stmt->bindParam(':image', $product['image'], PDO::PARAM_STR);

        $stmt->execute(); 
        return true;
      } catch(PDOException $e) {
        die($sql . "<br>" . $e->getMessage());
      }

      return false;
    }
  }
