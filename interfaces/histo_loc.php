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
     $localizar->hist_localizacao();
  
 ?>

<!DOCTYPE html>
	<html>
	<head>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo_personalizado.css">
	
    <title>Localização</title>
    <meta charset="utf-8" />
    <script type='text/javascript'>
    var map, sessionKey;
   
    var Loca1 = "<?php echo $localizar->getLatitude_inicial();?>";
    var Loca2 = "<?php echo $localizar->getLongitude_inicial();?>";
   
    var Loca3 = "<?php echo $localizar->getLatitude_final();?>";
    var Loca4 = "<?php echo $localizar->getLongitude_final();?>";


    function GetMap()
    {
        map = new Microsoft.Maps.Map('#myMap', {
            center: new Microsoft.Maps.Location(Loca1,Loca2),
            zoom: 15
        });
        //Get a session key from the map to use with the REST services to make those requests non-billable transactions.
        map.getCredentials(function (c) {
            sessionKey = c;   

            getRoute(Loca1+','+Loca2,Loca3+','+Loca4,'red'); 
        })
        var center = map.getCenter();

        //Create custom Pushpin
        var pin = new Microsoft.Maps.Pushpin(center, {
            title: 'Ponto',
            subTitle: 'de Partida',
            text: '1'
        });

        //Add the pushpin to the map
        map.entities.push(pin);
        
    }
    function getRoute(start, end, color) {
        //Calculate a route between the start and end points.
        var routeRequest = 'https://dev.virtualearth.net/REST/v1/Routes/Driving?wp.0=' + encodeURIComponent(start) + '&wp.1=' + encodeURIComponent(end) + '&ra=routePath&key=' + sessionKey;
        CallRestService(routeRequest, function (response) {
            if (response &&
               response.resourceSets &&
               response.resourceSets.length > 0 &&
               response.resourceSets[0].resources) {
                var route = response.resourceSets[0].resources[0];
                var routePath = route.routePath.line.coordinates;
                //Generate an array of locations for the route path.
                var locs = [];
                for (var i = 0, len = routePath.length; i < len; i++) {
                    locs.push(new Microsoft.Maps.Location(routePath[i][0], routePath[i][1]));
                }
                //Draw the route line.
                var line = new Microsoft.Maps.Polyline(locs, { strokeColor: color, strokeThickness: 3 });
                map.entities.push(line);
                //Add start and end pushpins.
                var startLoc = new Microsoft.Maps.Location(route.routeLegs[0].actualStart.coordinates[0], route.routeLegs[0].actualStart.coordinates[1]);
                var startPin = new Microsoft.Maps.Pushpin(startLoc, { icon: '/Common/images/pushpins/startPin.png', anchor: new Microsoft.Maps.Point(2, 42) });
                map.entities.push(startPin);
                var endLoc = new Microsoft.Maps.Location(route.routeLegs[0].actualEnd.coordinates[0], route.routeLegs[0].actualEnd.coordinates[1]);
                var endPin = new Microsoft.Maps.Pushpin(endLoc, { icon: '/Common/images/pushpins/endPin.png', anchor: new Microsoft.Maps.Point(2, 42) });
                map.entities.push(endPin);
            }
        });
    }
    function CallRestService(request, callback) {
        if (callback) {
            //Create a unique callback function.
            var uniqueName = getUniqueName();
            request += '&jsonp=' + uniqueName;
            window[uniqueName] = function (response) {
                callback(response);
                delete (window[uniqueName]);
            };
            //Make the JSONP request.
            var script = document.createElement("script");
            script.setAttribute("type", "text/javascript");
            script.setAttribute("src", request);
            document.body.appendChild(script);
        }
    }
    function getUniqueName() {
        var name = '__callback' + Math.round(Math.random() * 100000);
        while (window[name]) {
            name = '__callback' + Math.round(Math.random() * 100000);
        }
        return name;
    }
    </script>
    <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=At9NBbubYeU-qtKFoQtAFkQsmRk1DyxYV75NwDJtXUcueL-Papl59Vl2diCMWN7u' async defer></script>
</head>
<body>
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
                            <a href="historico_localizacao.php"> Nova consulta </a>
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