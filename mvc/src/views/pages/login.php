<?=$render('header');?>

			
	
    <section>
        <div class="container d-flex justify-content-center">
            <div class="row">
                <div class="col patas"><img src="<?=$base?>/assets/imagens/pegada.png" class="img-fluid patas" /></div>			
                    <span class="border" style="text-align:center; margin:10% auto;padding:60px; background:#ADD8E6; box-shadow:2px 3px 4px #ADD8E6; ">
                        <div class="col">
                            <form method="POST" action="../instancias/login.php">
                                <div class="form-group ">
                                    <label for="email">E-MAIL:</label>
                                    <input id="email" type="email" name="email" class="form-control" placeholder="E-mail" />
                                    <label for="senha">SENHA:</label>
                                    <input id="senha" type="password" name="senha" class="form-control" placeholder="senha" />
                                    <a href="">Esqueci minha senha</a>
                                </div>	
                                <div class="form-group">										
                                    <input class="btn btn-primary btn-lg" type="submit" value="ENTRAR" />
                                </div>
                            </form>
                            <a href="<?=$base?>/cadastro">
                                <input class="btn btn-secondary" type="submit" value="CADASTRE-SE" />
                            </a>		
                        </div>	
                </span>									
                <div class="col patas"><img src="<?=$base?>/assets/imagens/pegada.png" class="img-fluid patas" /></div>
            </div>	
        </div>
    </section>
	
	

		
<?=$render('footer');?>