<?php
//Tem que abrir o session_start para trabalhar com sessão
// Teste 2 - novo comentario.
//Aula de Projeto
// Hello Word
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Mountain - CRUD Ajax com Jquery</title>
		<script src="js/jquery.min.js"></script>
		<link rel="stylesheet" href="css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Lato:300i,400,400i,700,900|Roboto" rel="stylesheet">
		<script>
			
			<?php if(isset($_SESSION['id'])){?>
			function comentar(){
				var msg = $('#novo-comentario textarea').val();
				$('#comentarios').append(`
				<div class="comentario">
					<img src="img/<?php echo $_SESSION['foto'];?>" alt="<?php echo $_SESSION['nome'];?>">
					<div class="msgcomentario">
						<h4><?php echo $_SESSION['nome'];?></h4>
						<p>${msg}</p>
					</div>
				</div>
				`);
				$('#novo-comentario textarea').val('');
				
				
              $.ajax({
                  url: "server/adicionar-comentario.php",
				  method: "POST",
                  dataType: "json", //tipo de retorno.
                  data: {"texto": msg},
                  success: function(retorno){
                      if(retorno.deucerto){
                         console.log(retorno.mensagem);     
                      }else{
                        console.log(retorno.mensagem);
                        console.log(retorno.error);
                        alert("Opss.. erro no servidor, tente novamente!");
                      }
                  }
              });
			}
		<?php } ?>
		function excluir(id){
			$('[data-id-comentario='+id+']').fadeOut();
			$.ajax({
                  url: "server/excluir-comentario.php",
				  method: "POST",
                  dataType: "json", //tipo de retorno.
                  data: {"idcomentario":id},
                  success: function(retorno){
                      if(retorno.deucerto){
                         console.log(retorno.mensagem);     
                      }else{
                        console.log(retorno.mensagem);
                        console.log(retorno.error);
                        alert("Opss.. erro no servidor, tente novamente!");
                      }
                  }
              });
		}
		
		function editar(id){
			if(!$('[data-id-comentario='+id+'] .msgcomentario p').hasClass('editavel')){
								$('[data-id-comentario='+id+'] .msgcomentario p').after('<a class="salvar" href="javascript:;" onclick="salvar('+id+')">Salvar</a>');
			}
			$('[data-id-comentario='+id+'] .msgcomentario p').attr('contenteditable','true');
			$('[data-id-comentario='+id+'] .msgcomentario p').addClass('editavel');
			$('[data-id-comentario='+id+'] .msgcomentario p').focus();
		}

		function salvar(id){
			var texto = $('[data-id-comentario='+id+'] .msgcomentario p').text();
			$.ajax({
                  url: "server/editar-comentario.php",
				  method: "POST",
                  dataType: "json", //tipo de retorno.
                  data: {'idcomentario':id, 'novotexto': texto},
                  success: function(retorno){
                      if(retorno.deucerto){
                        $('[data-id-comentario='+id+'] .msgcomentario p').removeAttr('contenteditable');     
						$('[data-id-comentario='+id+'] .msgcomentario p').removeClass('editavel');
						$('[data-id-comentario='+id+'] .msgcomentario a').remove();
						console.log(retorno.mensagem);
					  }else{
                        console.log(retorno.mensagem);
                        console.log(retorno.error);
                        alert("Opss.. erro no servidor, tente novamente!");
                      }
                  }
            });
		}
		
		function login(){
			var user = $('#user').val();
			var pass = $('#pass').val();
			$.ajax({
                  url: "server/login.php",
				  method: "POST",
                  dataType: "json",
                  data: {'user':user, 'pass': pass},
                  success: function(retorno){
                      if(retorno.deucerto){
                        location.reload();
					  }else{
                        alert(retorno.mensagem);
                      }
                  }
            });
		}
		
		function logout(){
			$.ajax({
                  url: "server/logout.php",
				  method: "POST",
                  dataType: "json",
                  success: function(retorno){
                      if(retorno.deucerto){
                        location.reload();
					  }else{
                        alert('Deu ruim!');
                      }
                  }
            });
		}
		
		</script>
	
	</head>
	<body>
		<div id="page">
			<div id="header">
				<img class="logo" src="img/logo-mountain.svg" alt="Logo Montanha">
				<h1>Mountain Ajax CRUD</h1>
				
				
				<?php if(isset($_SESSION['id'])){?>
				<div id="login" style="text-align: right;">
					<span>Bem-vindo <?php echo $_SESSION['nome']; ?>!</span> <a href="server/logout.php">Sair</a>
				</div>
				<?php }else{ ?>
				<div id="login">
					<label>Usuário</label><input type="text" id="user">
					<label>Senha</label><input type="password" id="pass">
					<button onclick="login()">Entrar</button>
				</div>
				<?php } ?>

				<img src="img/mountain.jpg" alt="Foto Montanha Nevada">
			</div>
			<div id="content">
				<h1>Sobre Montanhas</h1>
				<h4>Por Renan Cavichi <span class="data">02/08/2018</span></h4>
				<p>
O famoso Monte Everest, localizado na cordilheira do Himalaia
Mauna Kea, montanha com 10 203 metros da base (no fundo do Oceano Pacífico) até o topo
O Pico da Neblina, com 2 994 metros, é o ponto mais alto do Brasil
Campos do Jordão é a cidade mais alta e montanhosa do Brasil com 1628m de altitude, está localizada no maciço da Serra da Mantiqueira
Montanhas Tatra em Zakopane (Polónia)
Montanha ou monte (do latim montanea, de mons, montis) é uma forma de relevo. Uma sequência de montanhas denomina-se cordilheira. Uma montanha tem imponência e altitude superiores a uma colina, embora não exista uma altitude específica para essa diferenciação. O adjetivo montano[1] é usado para descrever áreas montanhosas e coisas relacionadas a elas. Assim, cada autoridade no assunto assume valores convenientes, embora a montanha seja tipicamente escarpada, de grande inclinação e com sobreposição de relevos.</p>
				<p>A superfície do planeta Terra é 24% montanhosa; 10% da população mundial vive em terreno montanhoso. A maior parte dos grandes rios nascem em montanhas.</p>
				<p>Elas se destacam por apresentar altitudes superiores às das regiões vizinhas. As montanhas mais elevadas resultam de desdobramentos, isto é, de forças internas que provocaram enormes dobras nas rochas.</p>
			</div>
			
			<div id="comentarios">
			<!-- Lista de comentários -->
			<?php
			require 'server/conexao.php';
			try{
				$stmt = $conn->prepare("SELECT c.id, c.iduser, c.texto, u.name, u.photo FROM comentarios AS c JOIN usuario AS u ON c.iduser = u.id;"); 
				$stmt->execute();
				$resultado = $stmt->fetchAll(); 
			} catch(PDOException $e){
				echo $e->getMessage();
			}
			
			foreach($resultado as $valor){
			?>
			
				<div class="comentario" data-id-comentario="<?php echo $valor['id']; ?>">
					<img src="img/<?php echo $valor['photo']; ?>" alt="Renan Cavichi">
					<div class="msgcomentario">
						<?php if(isset($_SESSION['id']) && $_SESSION['id'] == $valor['iduser']){?>
						<i class="icon-excluir" onclick="excluir(<?php echo $valor['id']; ?>)"></i>
						<i class="icon-editar" onclick="editar(<?php echo $valor['id']; ?>)"></i>
						<?php } ?>
						<h4><?php echo $valor['name']; ?></h4>
						<p><?php echo $valor['texto']; ?></p>
					</div>
				</div>
			<?php
			}
			?>							
			</div>
			<?php if(isset($_SESSION['id'])){?>
			<div id="novo-comentario">
				<img src="img/<?php echo $_SESSION['foto']; ?>" alt="<?php echo $_SESSION['nome']; ?>">
				<textarea></textarea>
				<a href="javascript:;" onclick="comentar()" >Enviar</a>
			</div>
			<?php } ?>
			
		</div>
	</body>
</html>