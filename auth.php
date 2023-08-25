<?php
include_once("templates/header.php")

?>
<div id="main-container" class="container-fluid">
    <div class="col-md-12">
        <div class="row" id="auth-row">
            <div class="col-md-4" id="login-container">
                <h2>Entrar</h2>
                <form action="<?php echo $BASE_URL ?>auth_process.php" method="POST">
                    <input type="hidden" name="type" value="login">
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digie seu E-mail">
                    </div>
                    <div class="form-group">
                        <label for="password">Senha:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Digie sua senha">
                    </div>
                    <input type="submit" class="btn card-btn" value="Entrar">
                </form>
            </div>
            <div class="row" id="auth-row">
                <div class="col-md-4" id="register-container">
                    <h2>Criar Conta</h2>
                    <form action="<?php echo $BASE_URL ?>auth_process.php" method="POST">
                        <input type="hidden" name="type" value="register">
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Digie seu E-mail">
                        </div> 
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Digie seu Nome">
                        </div>
                        <div class="form-group">
                        <label for="lastname">sobrenome:</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Digie seu sobrenome">
                        
                    </div>
                    <div class="form-group">
                        <label for="password">Senha:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Digie sua senha">
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirmação de senha:</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirme sua senha">
                    </div>
                    <input type="submit" class="btn card-btn" value="Registrar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once("templates/footer.php")
?>