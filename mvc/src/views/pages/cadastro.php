<?=$render('/header');?>
    <div class="container alterar">
        <section>
            <form method="POST" action="../instancias/cadastro.php">
                <div class="form-group">
                    <div class="row justify-content-center" >
                        <div class="col-4">
                            <h3>Dados Pessais</h3>
                        </div>	
                    </div>
                    <hr/>		
                    <div class="row">
                        <div class="col">
                            <label for="nome"> Nome </label>
                            <input id="nome" type="text" name="nome" class="form-control" placeholder="Digite seu nome" /><br/>
                        </div>	
                        <div class="col">	
                                <label for="sobrenome"> Sobrenome </label>
                                <input id="sobrenome" type="text" name="sobrenome" class="form-control" 	placeholder="Digite seu sobrenome"  />
                        </div>							
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="email"> E-mail </label>
                            <input id="email" type="email" name="email" class="form-control" placeholder="Digite seu E-mail" /><br />
                        </div>
                        <div class="col">
                            <label for="senha"> Senha </label>
                            <input id="senha" type="password" name="senha" class="form-control" placeholder="Crie sua senha" /><br />

                        </div>	
                    </div>
                    <hr/>
                    <div class="row justify-content-center" >
                        <div class="col-4">
                            <h3>Endereço</h3>
                        </div>	
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col">
                            <label for="estado">Estado</label>
                            <select id="estado" size="1" name="estado" class="form-control">
                                <option value="0"> Selecione seu estado </option>
                                <option value="Acre"> Acre (AC) </option>
                                <option value="Alagoas"> Alagoas (AL) </option>
                                <option value="Amapá"> Amapá (AP) </option>
                                <option value="Amazonas"> Amazonas (AM) </option>
                                <option value="Bahia"> Bahia (BA) </option>
                                <option value="Ceará"> Ceará (CE) </option>
                                <option value="Distrito Federal"> Distrito Federal (DF) </option>
                                <option value="Espírito Santo"> Espírito Santo (ES) </option>
                                <option value="Goiás"> Goiás (GO) </option>
                                <option value="Maranhão"> Maranhão (MA) </option>
                                <option value="Mato Grosso"> Mato Grosso (MT) </option>
                                <option value="Mato Grosso do Sul "> Mato Grosso do Sul (MS) </option>
                                <option value="Minas Gerais"> Minas Gerais (MG) </option>
                                <option value="Pará"> Pará (PA) </option> 
                                <option value="Paraíba"> Paraíba (PB) </option>
                                <option value="Paraná"> Paraná (PR) </option>
                                <option value="Pernambuco"> Pernambuco (PE) </option>
                                <option value="Piauí"> Piauí (PI) </option>
                                <option value="Rio de Janeiro"> Rio de Janeiro (RJ) </option>
                                <option value="Rio Grande do Norte"> Rio Grande do Norte (RN) </option>
                                <option value="Rio Grande do Sul"> Rio Grande do Sul (RS) </option>
                                <option value="Rondônia"> Rondônia (RO) </option>
                                <option value="Roraima"> Roraima (RR) </option>
                                <option value="Santa Catarina"> Santa Catarina (SC) </option>
                                <option value="São Paulo"> São Paulo (SP) </option>
                                <option value="Sergipe"> Sergipe (SE) </option>
                                <option value="Tocantins"> Tocantins (TO) </option>
                            </select>
                                
                                
                        </div>
                        <div class="col">
                            <label for="cidade"> Cidade </label>
                            <input id="cidade" type="text" name="cidade" class="form-control" placeholder="Digite sua cidade" />
                        </div>
                        <div class="col">
                            <label for="bairro"> Bairro </label>
                            <input id="bairro" type="text" name="bairro" class="form-control" placeholder="Digite seu bairro" />
                        </div>	
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col">
                            <label for="rua"> Rua </label>
                            <input id="rua" type="text" name="rua" class="form-control"   placeholder="Digite sua rua" />
                        </div>
                        <div class="col">
                            <label for="cep"> CEP </label>
                            <input id="cep" type="number" name="cep" class="form-control"  placeholder="Digite seu cep" />
                        </div>
                        <div class="col">
                            <label for="numero"> Numero </label>
                            <input id="numero" type="number" name="numero" class="form-control"  placeholder=" numero de sua residência" />
                        </div>		

                    </div>
                    <br/>
                    <div class="row">
                        <div class="col">
                            <label for="complemento"> Complemento </label>
                            <input id="complemento" type="text" name="complemento" class="form-control"  placeholder="Digite complemento se houver" /><br>
                        </div>
                    </div>
                    <hr />
                    <div class="row justify-content-center" >
                        <div class="col-2">
                            <input class="btn btn-primary btn-lg" type="submit" value="Cadastrar"/>
                        </div>
                    </div>	
                </div>					
            </form>
        </section>	
        <div class="row justify-content-center" >
            <div class="col-2.5">
                <button class="btn btn-danger" onclick="cancelar()"> Cancelar </button>
            </div>		
        </div>		
                    
        
                            




        <!-- Funçao para alerta de cancelamento do cadastro -->
        <script>

            function cancelar()
            {
            var x;
            var ok =confirm("ATENÇÃO! Os seus dados não serão salvos");
            if (ok==true)
            {
            x=window.location.href = "login.html";
            }
            else
            {
            x= false;
            }
            document.getElementById("demo").innerHTML=x;
            }
        </script>
    </div>
<?=$render('footer');?>    
	



