<?php
  
  session_start();
 
  if (isset($_SESSION['id']) && empty($_SESSION['id']) == false) {

  //echo "Área restrita ! Seu id é ".$_SESSION['id'].".";
        
    } 
    else {

    header("Location:login.html");

    }
    require_once '../classes/classeLocalizacao.php';
     $localizar = new localizacao();
     $localizar->localizacao_atual();

     
    
 ?>

<html>
<head>
    <title>Localização</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo_personalizado.css">
    
</head>
<body>
    <div class="container">
        <script type='text/javascript'>
            var map,pin;

            function GetMap() {
                map = new Microsoft.Maps.Map('#myMap', {
                    credentials: 'At9NBbubYeU-qtKFoQtAFkQsmRk1DyxYV75NwDJtXUcueL-Papl59Vl2diCMWN7u',
                    center: new Microsoft.Maps.Location(<?php echo $localizar->getLatitude_atual().','.$localizar->getLongitude_atual();  ?> ),
                    zoom: 16
                }); 
                var center = map.getCenter();

                //Create custom Pushpin
                var pin = new Microsoft.Maps.Pushpin(center, {
                    color: 'red'
                });

                //Add the pushpin to the map
                map.entities.push(pin);

                
                //Create an infobox that will render in the center of the map.
                var infobox = new Microsoft.Maps.Infobox(center, {
                    title: 'Localização',
                    description: 'Seu pet está localizado aqui'
                });

                //Assign the infobox to a map instance.
                infobox.setMap(map);
            }
        </script>
        <script type='text/javascript' src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap' async defer></script>
    
        <header>		
            <div class="container d-flex justify-content-center">
                <img src="../imagens/logo.png" class="img-fluid" />
                        
            </div>		
        </header>

        <section>    
            <div class="container d-flex justify-content-center map">
                <div id="myMap" style="position:relative;width:1000px;height:400px;"></div>
            </div>
            <hr/>
            <div class="container menu">
                <section>
                    <div class="row linha" >
                        <div class="col coluna">
                            <a href="localizacao_atual.php"> Nova consulta </a>
                        </div>
                        <div class="col coluna">
                            <a href="index.php"> Voltar para a página principal </a> 
                        </div>
                    </div>
            </div>             
        </section>      
        
        <footer>
            <hr />
            <div class="container d-flex justify-content-center">
                Copyright &copy; 2020 - by Filipe Andrade	
            </div>
            <div class="container d-flex justify-content-center">
                <a href="https://www.linkedin.com/in/carlos-filipe-1232571a0/" target="_blank">
                    <img src="../imagens/linkedin.png" class="img-fluid">
                    LinkedIn &nbsp;
                </a>
                <a href="https://www.instagram.com/filipe.andrade_/" target="_blank">
                    <img src="../imagens/instagram.png" class="img-fluid">
                    Instagram  
                </a>
            </div>    
        </footer>
    </div>    
</body>
</html>


      
    

     
      





 