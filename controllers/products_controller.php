<?php
  require_once('models/product.php');

  class ProductsController {
    public function admin_index() {
      return view('views/products/admin/index.php');
    }

    public function admin_add() {
      $message_type = '';

      if(!empty($_POST)) {
        $product['name'] = strip_tags($_POST['name']);
        $product['summary'] = strip_tags($_POST['summary']);
        $product['description'] = strip_tags($_POST['description']);
        $product['list_price'] = (float)($_POST['list_price']);
        $product['sale_price'] = (float)($_POST['sale_price']);
        $product['stock'] = intval($_POST['stock']);
        $product['status'] = intval($_POST['status']);

        if ($_FILES && isset($_FILES['image']) && !empty($_FILES['image'])) {
          $target_dir = "public/uploads/";
          $target_file = $target_dir . basename($_FILES["image"]["name"]);
          $uploadOk = 1;
          $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
          
          if (isset($_POST["save"])) {
            $check = getimagesize($_FILES['image']["tmp_name"]);
            if($check !== false) {
              $uploadOk = 1;
            } else {
              $uploadOk = 0;
            }
          }

          // Check if file already exists
          if (file_exists($target_file)) {
              // echo "Sorry, file already exists.";
              $uploadOk = 0;
          }
          // Check file size
          if ($_FILES["fileToUpload"]["size"] > 500000) {
              // echo "Sorry, your file is too large.";
              $uploadOk = 0;
          }
          // Allow certain file formats
          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
              // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
              $uploadOk = 0;
          }

          if ($uploadOk == 0) {
              $message = "Sorry, your file was not uploaded.";
              $message_type = 'error';
          } else {
              if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                  $product['image'] = $target_file;
              } else {
                  $message = "Sorry, there was an error uploading your file.";
                  $message_type = 'error';
              }
          }
        }

        if ($message_type != 'error' && (!$product['name'] || !$product['sale_price'])) {
          $message_type = 'error';
          $message = 'Validation error. Name and sale price are required.';
        }
        
        if ($message_type != 'error') {
          if (Product::add($product)) {
            $message_type = 'success';
            $message = 'Product added!';
          } else {
            $message_type = 'error';
            $message = 'No product added';
          }
        }
          
        return view('views/products/admin/add.php', compact('message_type', 'message'));
      }

      return view('views/products/admin/add.php');
    }

    public function view() {
      $product = Product::find($_GET['id']);
      if ($product) {
        return view('views/products/view.php', compact('product'));  
      }
      
      return view('views/pages/error.php');
    }
  }