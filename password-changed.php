<?php require_once "dataProcessing.php"; ?>
<?php
if($_SESSION['info'] == false){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Titan | Login Again</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/icons/logo.png">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
            <div class="form-div">
            <?php
            if(isset($_SESSION['info'])){
                ?>
                <div class="success-div">
                <?php echo $_SESSION['info']; ?>
                </div>
                <?php
            }
            ?>
                <form action="products.php" method="POST">
                    <div class="form-group">
                        <input class="submitBtn" type="submit" name="login-now" value="Login Now">
                    </div>
                </form>
            </div>
        </div>

</body>
</html>
