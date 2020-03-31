<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <!--Bootstrap-->
         <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
		 <!--Import-->
		 <script type="text/javascript" src="/busca/script.js"></script>
		 <link rel="stylesheet"href="style.css">
    </head>
    <body>
        <header>
        	<!--Menu de navegação/Pesquisa-->
        	<nav class="navbar navbar-toggleable-md navbar-light" style="background-color: #eff5f5;">
    			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      				<span class="navbar-toggler-icon"></span>
    			</button>
   				<a class="navbar-brand" href="/img/logoads.png" target="_blank">
                    <img src="/img/logoads.png" class="rounded" width="30" height="30" id="img" alt="ModuloADS"/>
                </a>
    			<div class="collapse navbar-collapse" id="navbarColor03">
      				<ul class="navbar-nav mr-auto">
        				<li class="nav-item active">
          				<a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
        				</li>
        				<li class="nav-item">
          					<a class="nav-link" href="geradorxml.php" target="_blank">Minerar produtos</a>
        				</li>
        				<li class="nav-item">
          					<a class="nav-link" href="DB.php" target="_blank">Atualizar Banco de Dados</a>
        				</li>
        				<li class="nav-item">
          					<a class="nav-link" href="XmlList.php">Lista XML</a>
        				</li>
      				</ul>
    			</div>
  			</nav> 
        </header>
        <div class="container-fluid" id="principal">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 text-center">
                    <!-- Inicio campo pesquisa-->
                    <div class=" card ">
                        <div class="card-header bg-light">
                            <h3>Pesquisar Produtos<i class="fa fa-search" aria-hidden="true"></i></h3>    
                        </div>
                        <div class="card-body">
                           <form  method="POST" action="/busca/busca.php" id="pesquisa">
        				    <input class="form-control sm-0" value="" placeholder="Busca" type="text" name="pesquisar" id="pesquisar" required="" onkeyup="pesquisaSql();"/>
        				    <input type="submit" class="btn btn-outline-primary my-2 my-sm-0"/>
                            <a href="index.php" class="btn btn-outline-primary my-2 my-sm-0" id="botao">Limpar Busca</a>
      				        </form>
                        </div>
                    </div>
                    <!-- Fim campo pesquisa-->
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        <div class="container">
            <article>
                <span id="resultadoPesquisa"></span>
            </article>
        </div>
        <footer class="card bg- bottom">
                <div class="container-fluid">
                    <div class="col"></div> 
                        <div class="col text-center">
                            <br/>
                            <h2>Integrantes</h2>
                            <br/>
                            <p>João, Max, Thiago, Bianca, Matheus, Wesley</p>
                        </div> 
                    <div class="col"></div> 
                </div>
            </footer>
    </body>
</html>


