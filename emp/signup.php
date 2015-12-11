<?php 
  include_once '../core/init.php';
  
    if (isset($_POST['signup']) && !empty($_POST) ) {
        // print_r($_POST); 
        // exit();
        $reg = new UserRegistration();

        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];

        $username = $_POST['username'];
        $dob = $_POST['dob']; 
        $age = General::dob2age($dob);
        $gender = $_POST['gender']; 

        $city = $_POST['city'];
        $country = $_POST['country'];
        $postCode = $_POST['postal'];
        $cellNumber = $_POST['user_mobile'];
        $cnic = $_POST['cnic'];

        $address = $_POST['address'];
        $joinDate = ''; //current date
        $email = $_POST['email'];
        $password = $_POST['password'];
        $username= $_POST['username'];
        $cvUrl = "";

        $userType = $_POST['user_type']; 

        $done = $reg->registerUser($firstName,$username, $age, $gender, $city, $country, $postCode, $cellNumber, $cnic, $dob,
        $address, $email, $password, $cvUrl, $userType);

        if($done)
            header("Location: $pageName?success"); 

        if( isset(Error::$instantError) && !empty(Error::$instantError) )
            echo Error::$instantError;


    }
  
    if (isset($_GET['success'])/* && !empty($_GET['success'])*/)
        echo "Registered Successfully."; 
  

?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Form | Employee</title>
  <link rel="stylesheet" href="https://raw.githubusercontent.com/necolas/normalize.css/master/normalize.css">
  <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="../css/main.css">
</head>

<body>
  <h1>Dihari</h1>
  <hr>
  <form action="" method="post">
  
    <h2>Registration for Employee</h2>

    <fieldset>
      <legend><span class="number">1</span>Your basic info</legend>
      
      <label for="fname">First Name:</label>
      <input type="text" id="fname" name="first_name">

      <label for="lname">Last Name:</label>
      <input type="text" id="lname" name="last_name">
      
      <label for="username">User Name:</label>
      <input type="text" id="username" name="username" value="<?php if(isset($username)) echo $username; ?>">
      
      <label for="email">Email:</label>
      <input type="email" id="email" name="email">

      <label for="password">Password:</label>
      <input type="password" id="password" name="password">
      
      <label for="dob">Date of birth:</label>
      <input type="date" id="dob" name="dob">

      <label>Gender:</label>
      <input type="radio" id="male" value="male" name="gender">
      <label for="male" class="light">Male</label>
      <br>
      <input type="radio" id="female" value="female" name="gender">
      <label for="female" class="light">Female</label>
      
      <br><br>
      <label for="address">Address:</label>
      <input type="text" id="address" name="address">

      <label for="city">City:</label>
      <input type="text" id="city" name="city">
      
      <label for="country">Country:</label>
      <input type="text" id="country" name="country">

      <label for="cnic">CNIC:</label>
      <input type="number" id="cnic" name="cnic">
      
      <label for="postal">Postal Code:</label>
      <input type="number" id="postal" name="postal">

      <label for="mobile">Mobile:</label>
      <input type="number" id="mobile" name="user_mobile">
    </fieldset>

    <fieldset>
      <legend><span class="number">2</span>Your profile</legend>
      <label for="bio">Biography:</label>
      <textarea id="bio" name="user_bio"></textarea>
    </fieldset>
    <fieldset>
      <label for="user_type">Job Role:</label>
      <select id="user_type" name="user_type">
        <optgroup label="Company">
          <option value="registered_company">Registered</option>
          <option value="non_registered_company">Non Registered</option>
        </optgroup>
        <optgroup label="Individual">
          <option value="reg_employee">Registered Employee</option>
          <option value="free_lancer">Free Lancer</option>
        </optgroup>
      </select>

      <!-- <label>Interests:</label>
      <input type="checkbox" id="construction" value="interest_construction" name="user_interest">
      <label class="light" for="construction">Construction</label>
      <br>
      <input type="checkbox" id="repairing" value="interest_repairing" name="user_interest">
      <label class="light" for="repairing">Repairing</label>
      <br>
      <input type="checkbox" id="teaching" value="interest_teaching" name="user_interest">
      <label class="light" for="teaching">Teaching</label>
      <br>
      <input type="checkbox" id="business" value="interest_business" name="user_interest">
      <label class="light" for="business">Business</label> -->

    </fieldset>
    <button type="submit" name="signup">Sign Up</button>
  </form>

</body>

</html>