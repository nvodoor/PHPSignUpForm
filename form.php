<?php 
    
// connecting to mysql database in php. mysql connect is now deprecated. Don't use it! 
// localhost is how you access the database if it's on the same server as your site. Otherwise, you just use the ip/other address given.
// next is username
// last is password
// after that is database
    
    $link = mysqli_connect("server", "username", "password", "database");

    // way to kill script if connection fails

    if (mysqli_connect_error()) {
        die ("There was an error connecting to the database");
    }



    $email = $_POST['email'];

    $password = $_POST['password'];

    if ($email === "" || $password === "") {
        echo "Not every field is filled.";
    } else {
        
        $query = "SELECT * FROM users WHERE email = '$email'";
        
        if ($result = mysqli_query($link, $query)) {
        
           if (sizeof($row = mysqli_fetch_array($result)) > 0) {
             echo "Your email is: ".$row[1];
           } else {
               $query = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
               mysqli_query($link, $query);
           }
        
        }
        
    }
    


    

?>


<!-- HTML WOULD GO DOWN BELOW-->

<!DOCTYPE HTML>
<html>
    <head>
 
    
    </head>

    <body>
        
        
        <h2>Sign Up Form</h2>
        <form method="POST">
            <input type="text" name="email" value = "email">
            <input type="password" name="password" value = "password">
            <button type="submit" id="submit">Submit</button>
        </form>
        


        
        
        <!-- jQuery first, then Tether, then Bootstrap JS. -->
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        
        <script type="text/javascript">
            
        
        </script>
    
    </body>
</html>
