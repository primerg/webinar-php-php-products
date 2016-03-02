<?php
  require_once('models/user.php');

  class UsersController {
    public function is_loggedin() {
      if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])) {
        return true;
      }

      return false;
    }

    public function auth_only() {
      if (!$this->is_loggedin()) {
        header('Location: ' . url('/login'));
      }
    }

    public function login() {
      if(!empty($_POST['username']) && !empty($_POST['password'])) {
        // let the user login
        $username = strip_tags($_POST['username']);
        // $password = md5(mysql_real_escape_string($_POST['password']));

          

        $user = User::find_user($_POST['username'], $_POST['password']);
        if ($user) {
          $_SESSION['Username'] = $username;
          $_SESSION['UserID'] = $user->id;
          $_SESSION['LoggedIn'] = 1;
          header('Location: ' . url('/account'));  
        }

        $message_type = 'error';
        $message = 'Unrecognized user';
        return view('views/users/login.php', compact('message_type', 'message'));
      }

      if ($this->is_loggedin()) {
        header('Location: ' . url('/'));
      }
      
      return view('views/users/login.php');
    }

    public function register() {
      if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])) {
        $username = strip_tags($_POST['username']);
        $password = md5($_POST['password']);
        $email = strip_tags($_POST['email']);

        $user = new User(null, $username, $email, $password);
        User::add($user);

        header('Location: ' . url('/login'));
      }

      if ($this->is_loggedin()) {
        header('Location: ' . url('/account'));
      }
      
      return view('views/users/register.php');
    }

    public function logout() {
      $_SESSION = array(); 
      session_destroy();
      header('Location: ' . url('/login'));
      exit();
    }

    public function account() {
      $user = User::find($_SESSION['UserID']);
      if (!$user) {
        header('Location: ' . url('/'));
      }
      return view('views/users/account.php', compact('user'));
    }

    public function users() {
      $this->auth_only();

      $user_list = User::all();
      return view('views/users/users.php', compact('user_list'));
    }
  }