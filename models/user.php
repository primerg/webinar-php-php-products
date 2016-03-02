<?php
  class User {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $id;
    public $username;
    public $password;
    public $email;

    public function __construct($id, $username, $email, $password = '') {
      $this->id       = $id;
      $this->username = $username;
      $this->password = $password;
      $this->email = $email;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM users');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new User($post['id'], $post['username'], $post['email']);
      }

      return $list;
    }

    public static function find_user($username, $password) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM users WHERE username = :username AND password = :password');

      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('username' => $username, 'password' => md5($password)));
      $post = $req->fetch();

      if ($post) {
        return new User($post['id'], $post['username'], $post['email']);  
      }

      return false;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM users WHERE id = :id');

      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();

      if ($post) {
        return new User($post['id'], $post['username'], $post['email']);  
      }

      return false;
    }

    public static function add($user) {
      $sql = "INSERT INTO users(username,
            email,
            password) VALUES (
            :username, 
            :email, 
            :password)";
                            
      try {
        $db = Db::getInstance();
        $stmt = $db->prepare($sql);
                                                      
        $stmt->bindParam(':username', $user->username, PDO::PARAM_STR);       
        $stmt->bindParam(':password', $user->password, PDO::PARAM_STR); 
        $stmt->bindParam(':email', $user->email, PDO::PARAM_STR); 
                                              
        $stmt->execute(); 
      } catch(PDOException $e) {
        die($sql . "<br>" . $e->getMessage());
      }
    }
  }
