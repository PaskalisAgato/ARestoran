<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="vievport" content="width=device-width, initial-scale=1">
    <title>login | RestoranAga</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
    <div class="box-login">
        <h2>login</h2>
        <form action="" method="post">
            <Input type ="text" name="user" placeholder="username" class="input-control">
            <Input type ="password" name="pass" placeholder="password" class="input-control">
           <P><button type ="sumbit" name="sumbit">Login</button><p>
        </form>
        <?php
            if(isset($_POST['sumbit'])){
                session_start();
                include 'db.php';

                $user = $_POST['user'];
                $pass = $_POST['pass'];
                
                $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$user."'AND password = '".MD5($pass)."'");
                if(mysqli_num_rows($cek) > 0){
                    $d = mysqli_fetch_object($cek);
                    $_SESION['status_login'] = true;
                    $_SESION['a_global'] = $d;
                    $_SESION['id'] = $d->admin_id;
                    echo '<script>window.location="dasboard.php"</script>';
            }else{
                echo '<script>alert("Username atau password Anda salah!"</script>';
                }
                
            }
        ?>
    </div>
</body>
</html>