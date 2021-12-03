<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Password Reset</title>
</head>
<body>
<header class="navbar">
<a href="welcome.html"><img src="../assets/Getflix.png" width="200rem" height="80rem"></a>
</header>
<main>
    <div class="fill_form">
<form action="" method="post">
    <h2>PASSWORD RESET</h2>
    <?php
  
    <label for="password1">Enter your new password</label>
   <input type="password" name="password1" class='sf' placeholder='Please,enter your new password'><br>
   <label for="password2">Repeat your new password</label>
   <input type="password" name="password2" class='sf' placeholder='Please,repeat your new password'>
   <br>
<button name="submit" type="submit">SUBMIT</button>
</form>
    </div>
    <?php
                            } else {
                                array_push($errors,"<h2>Link Expired</h2>>");
                            }
                        }
                       /* if ($error != "") {
                            echo "<div class='error'>" . $error . "</div><br>";
                        }*/
                    }


                    if (isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"] == "update")) {
                        $error = "";
                        $password1 = strip_tags($_POST["password1"]);
                        $password2 = strip_tags($_POST["password2"]);
                        $email = $_POST["email"];
                        $curDate = date("Y-m-d H:i:s");
                        if ($pass1 != $pass2) {
                            $error .= "<p>Password do not match, both password should be same.<br /><br /></p>";
                        }
                        if ($error != "") {
                            echo $error;
                        } else {

                            $password1 = md5($password1);
                            $sql ="UPDATE users SET password = '$password1', acc_date = '$curDate' WHERE email = '$email'";
                            $db->prepare($sql)->execute([$password1,$curDate,$email]);

                            $del_statement="DELETE FROM password_reset_temp WHERE email = '$email'";
                            $db->prepare($del_statement)->execute();

                            echo '<div class="error"><p>Your password has been updated successfully.</p>';
                        }
                    }
                    ?>
</main>
</body>
</html>