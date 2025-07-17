<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codebid Team Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background: url(https://i.ibb.co/VQmtgjh/6845078.png) no-repeat;
            background-size: cover;
            height: 100vh;
            font-family: sans-serif;
            overflow: hidden;
        }
        .login-box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 350px;
            min-height: 200px;
            background: #000000;
            border-radius: 10px;
            padding: 40px;
            box-sizing: border-box;
            color: #fff;
        }
        .user-img {
            width: 100px;
            height: 100px;
        }
        h3 {
            margin: 0 0 20px;
            color: #59238F;
            text-align: center;
        }
        .login-box input[type="text"],
        .login-box input[type="password"] {
            border: none;
            border-bottom: 2px solid #262626;
            outline: none;
            height: 40px;
            color: #fff;
            background: transparent;
            font-size: 16px;
            padding-left: 20px;
            box-sizing: border-box;
            width: 100%;
            margin-bottom: 20px;
        }
        .login-box input[type="submit"] {
            border: none;
            outline: none;
            height: 40px;
            font-size: 16px;
            background: #59238F;
            color: #fff;
            border-radius: 20px;
            cursor: pointer;
            width: 100%;
        }
        p {
            color: #0000ff;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="login-box shadow-lg">
        <img class="user-img border border-light rounded-pill mx-auto d-block mb-4" src="./images/logo.png" alt="User Logo">
        <h3>Login</h3>
        <div class="text-center">
            <p class="text-danger">
                <?php if(isset($_GET['action'])) { echo $_GET['action']; } ?>
            </p>
        </div>
        <form action="userloginaction.php" method="post">
            <div class="mb-3">
                <input id="uname" class="form-control" type="text" name="Userid" placeholder="Userid">
            </div>
            <div class="mb-3">
                <input id="pass" class="form-control" type="password" name="Password" placeholder="Password">
            </div>
            <input type="submit" name="login" value="Login">
        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
