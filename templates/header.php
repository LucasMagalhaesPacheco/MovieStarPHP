<?php

 require_once("globals.php");
 require_once("db.php");
 require_once("models/Message.php");
 require_once("dao/UserDAO.php");
  $message = new Message($BASE_URL);
  $flassMessage = $message->getMessage();

  if(!empty($flassMessage["msg"])) {
    // Aqui vamos limpar a mensagem de erro ou acerto do Código
    $message->clearMessage();
  }

  $userDao = new UserDAO($conn, $BASE_URL);
  // Verify user login
  
  $userData = $userDao->verifyToken(false);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieStar</title>
    <link rel="short icon" href="<?php echo $BASE_URL ?>img/movies/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.1/css/bootstrap.css" integrity="sha512-azoUtNAvw/SpLTPr7Z7M+5BPWGOxXOqn3/pMnCxyDqOiQd4wLVEp0+AqV8HcoUaH02Lt+9/vyDxwxHojJOsYNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo $BASE_URL ?>css/styles.css">

</head>
<body>
    <header>
        <nav id="main-navbar" class="navbar navbar-expand-lg">
            <a href="<?php echo $BASE_URL ?>" class="navbar-brand">
        <img src="<?php echo $BASE_URL ?>img/logo.png" alt="Moviestar Logo" id="logo">
         <span id="moviestar-title">FlixNerd</span>
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
        </button>
         <form action="" method="GET" id="search-form" class="form-inline my-2 my-lg-0">
         <input type="text" name="q" id="search" class="form-control mr-sm-2" type="search" placeholder="Buscar Filmes" aria-label="Search">
        <button class="btn my-2 my-sm-0" type="submit">
          <i class="fas fa-search"></i>
        </button>
         </form>
         <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav">
               <?php if($userData):  ?>
                <li class="nav-item">
                    <a href="<?php echo $BASE_URL ?>newmovie.php" class="nav-link"><i class="far fa-plus-square"></i> Incluir filme </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $BASE_URL ?>dashboard.php" class="nav-link">My Movies </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $BASE_URL ?>editprofile.php" class="nav-link bold"> <?php echo $userData->name ?> </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $BASE_URL ?>logout.php" class="nav-link">Logout </a>
                </li>
                 <?php else: ?>
                    <li class="nav-item">
                    <a href="<?php echo $BASE_URL ?>auth.php" class="nav-link">Entrar / Cadastrar </a>
                </li>
                <?php endif; ?>
            </ul>
         </div>
        </nav>
    </header>

    <?php if(!empty($flassMessage["msg"])): ?>
        <div class="msg-container">
        <p class="msg <?= $flassMessage["type"] ?>"><?= $flassMessage["msg"] ?></p>
    </div>
    <?php endif; ?>

    