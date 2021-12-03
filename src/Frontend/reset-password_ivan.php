<?php include("../composant/head.html");
include ("../Composant_php/config.php")
?>
<div class="container-fluid">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <?php
                    $array_err=array();
                    $pattern = '/^(?=.*[0-9])(?=.*[A-Z])$/';
                  
                    if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"] == "reset") && !isset($_POST["action"])) {
                        $key = $_GET["key"];
                        $email = $_GET["email"];
                        $curDate = date("Y-m-d H:i:s");
                        $query =  "SELECT * FROM password_reset_temp WHERE `key_temp`='$key' and `email`='$email';";
                        $results = $conn->query($query);
                        // $row=$results->fetch_assoc();
                        if ($results->num_rows==0 ) {
                            $error .= '<h2>Invalid Link</h2>';
                        } else {
                            $row=$results->fetch_assoc();
                            $expDate = $row['expDate'];
                            if ($expDate >= $curDate) {
                                ?> 
                                <h2>Reset Password</h2>   
                                <form method="post" action="" name="update">
                                    <input type="hidden" name="action" value="update" class="form-control"/>
                                    <div class="form-group">
                                        <label><strong>Enter New Password:</strong></label>
                                        <input type="password"  name="pass1" value="update" class="form-control"/>
                                    </div>

                                    <div class="form-group">
                                        <label><strong>Re-Enter New Password:</strong></label>
                                        <input type="password"  name="pass2" value="update" class="form-control"/>
                                    </div>
                                    <input type="hidden" name="email" value="<?php echo $email; ?>"/>
                                    <div class="form-group">
                                        <input type="submit" id="reset" value="Reset Password"  class="btn btn-primary"/>
                                    </div>
                                </form>
                                <?php
                            } else {
                                $error .= "<h2>Link Expired</h2>>";
                            }
                        }
                        if ($error != "") {
                            echo "<div class='error'>" . $error . "</div><br />";
                        }
                    }

                    if (isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"] == "update")) {
                        if (empty(trim($_POST["pass1"]))) { //CONTROL IF EMPTY INPUT
                            $password_err = "Please enter a password.";
                            array_push($array_err, $password_err);
                          } elseif (strlen(trim($_POST["pass1"])) < 6) { //CONTROL ON CHARACTER LENGHT
                            $password_err = "Password must have atleast 6 characters.";
                            array_push($array_err, $password_err);
                          }
                          elseif (preg_match($pattern,$_POST["pass1"])) {
                            $password_err="Password must have at least 1 uppercase and 1 number";
                            array_push($array_err,$password_err);
                          }
                        $error = "";
                        $pass1 = mysqli_real_escape_string($conn, $_POST["pass1"]);
                        $pass2 = mysqli_real_escape_string($conn, $_POST["pass2"]);
                        $email = $_POST["email"];
                        if ($pass1 != $pass2) {
                            $error .= "<p>Password do not match, both password should be same.<br /><br /></p>";
                        }
                        if (!empty($array_err)) {
                            echo "<p>".$password_err."</p>";
                        } else {

                            $pass1 =password_hash($pass1,PASSWORD_DEFAULT);
                            mysqli_query($conn, "UPDATE Users SET `User_Password` = '$pass1'WHERE `Email` = '$email';");
                            mysqli_query($conn, "DELETE FROM password_reset_temp WHERE `email` = '$email';");
                            echo '<div class="error"><p>Congratulations! Your password has been updated successfully.</p>';
                        }
                    }
                    ?>

                </div>
                <div class="col-md-4"></div>
            </div>
        </div>