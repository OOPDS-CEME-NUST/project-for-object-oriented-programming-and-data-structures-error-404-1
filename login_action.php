  <?php
  session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'stylon');

  $username = mysqli_real_escape_string($db, $_POST['usern']);
  $password = mysqli_real_escape_string($db, $_POST['pass']);

  if (empty($username)) {    header('location: login.php');
  }
  if (empty($password)) {    header('location: login.php');
  }

  if (count($errors) == 0) {

    $query = "SELECT * FROM accounts WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
$auth = mysqli_fetch_assoc($results);      
 
      header('location: barber_home.php');
    }else {
      header('location: login.php');
    }
  }
  ?>