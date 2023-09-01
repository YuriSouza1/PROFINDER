<?php 
    session_start(); // iniciailizando a sessão 
    if(empty($_SESSION)){
        print "<script>location.href=index.php';</script>";
    }

 
    $usuario =""; 

    if ($_SERVER["REQUEST_METHOD"] == "GET") {  // condicional para  ver c o methodo sera get
        $con = new mysqli("localhost", "root", "", "sistema2"); // c for ira iniciar a sessao 
        $stmt = $con->prepare("select * from aluno where id = ?"); // fazendo um select na nossa tabela professor onde nao sabemos quem e o id

        $id = intval($_SESSION["id"]);  // criando a variavel id 

        $stmt->bind_param("i", $id); // bindando a variavel id com inteiro

        $stmt->execute(); // exevutadno 

        $result = $stmt->get_result(); 

        if ($row = $result->fetch_array()) { // iremos seguir um array do banco de dados onde sera gravado as variaveis com os nomes dos campos 
            $usuario = $row["usuario"];
            $escolaridade = $row["escolaridade"];
            $instituicao = $row["instituicao"];
            $materia = $row["materia"];
            $sobremim = $row["sobremim"];
        }
    
        $result->close();
    
        $stmt->close();
     
        $con->close();
    }  
    else if ($_SERVER["REQUEST_METHOD"] == "POST") { //condicional do servidor com o methodo post 

        $con = new mysqli("localhost", "root", "", "sistema2"); // conexão do banco

        $stmt = $con->prepare("update aluno set usuario = ?,escolaridade = ?,instituicao = ?,materia = ?,sobremim = ? where id = ?"); // dando update na tabela aluno 
    
        $id = intval($_SESSION["id"]); // recebendo o id da sessao 

        $stmt->bind_param("sssssi", $_POST["usuario"],$_POST["escolaridade"],$_POST["instituicao"],$_POST["materia"],$_POST["sobremim"],$id); // bindando os parametro com o nome da tabela 
    
        $stmt->execute();
    
        $stmt->close();
     
        $con->close(); 

        $_SESSION["usuario"] = $_POST["usuario"]; // atualizando o nome de kd variavel para aparecer na tabela 
        $_SESSION["escolaridade"] = $_POST["escolaridade"];
        $_SESSION["instituicao"] = $_POST["instituicao"];
        $_SESSION["materia"] = $_POST["materia"];
        $_SESSION["sobremim"] = $_POST["sobremim"];
        
        print "<script>alert('atualização de dados realizado com sucesso!');</script>";
        print "<script>location.href='ver_perfil_aluno.php';</script>";

    }



?>
    


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' type='text/css' media='screen' href='CSS/editaraluno.css'>
</head>

<body>

<header>
        <section id="cabecalho">
            <nav>
                <div id="menu">
                    <div id="menu-bar" onclick="menuOnClick()">
                      <div id="bar1" class="bar"></div>
                      <div id="bar2" class="bar"></div>
                      <div id="bar3" class="bar"></div>
                    </div>
                    <nav class="nav" id="nav">
                      <ul>
                        <li><a href="tela_inicial_aluno.php">Home</a></li>
                        <li><a href="ver_perfil_aluno.php">Ver perfil</a></li>
                        <li><a href="editar_perfil_aluno.php">Editar perfil</a></li>
                        <li><a href="landing_page.php">Sobre o site</a></li>
                      </ul>
                    </nav> 
                  </div>
                  <div class="menu-bg" id="menu-bg"></div>
            </nav>
            <h1 id="cbl_title">ProFinder</h1>
            <div>
                <input type="text" id="search-input" placeholder="Digite a matéria procurada:">
                <img src="imagens/lupa 1.png" id="lupa" alt="lupa">
                <ul id="search-results"></ul>
            </div>
            <img id="user" src="imagens/user.webp" alt="user">
            <div>
                <div class="nome">
                    <p>Nome: <?php print $_SESSION["usuario"]?> </p>
                    
                </div>
                <p class="conta">Conta do aluno.</p>
                <p class="conta"> <?php print '<a href="logout.php"> SAIR </a>' ?> </p>
            </div>
        </section>

    <main>
        <div class="main-container">
            <h2>Edição de Perfil</h2>

            <form action="editar_perfil_aluno.php" method="post">

                <p class="legenda" >Usuario:</p>
                <input type="text" name="usuario" value="<?php echo $usuario ?>">

                <p class="legenda">Sobre mim:</p>
                <input type="text"name="sobremim" rows="3" value="<?php echo $sobremim ?>">
                
                <p class="legenda">Grau de escolaridade:</p>
                <input type="text" name="escolaridade"value="<?php echo $escolaridade ?>">

                <p class="legenda">Instituições:</p>
                <input type="text" name="instituicao" value="<?php echo $instituicao?>">

                <p class="legenda">Materia com mais dificuldade:</p>
                <input type="text" name="materia" value="<?php echo $materia?>">

                
    
                <button type="submit">Concluir alterações</button>
            </form>
        </div>   
    </main>

    <footer>
        <div id="footer_content">
            <div id="footer_contacts">
                <img id="logo" src="Imagens/logo.png" alt="logo">
                <p>
                    Bem-vindo ao <span>ProFinder</span>, uma plataforma que vai te ajudar com suas
                    dúvidas da melhor maneira possível!
                </p>

                <div id="footer_social_media">
                    <a href="#" class="footer-link" id="instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="#" class="footer-link" id="facebook">
                        <i class="fa-brands fa-discord"></i>
                    </a>

                    <a href="#" class="footer-link" id="whatsapp">
                        <i class="fa-brands fa-github"></i>
                    </a>
                </div>
            </div>
            
            <ul class="footer-list">
                <li>
                    <h3>Início</h3>
                </li>
                <li>
                    <a href="tela_inicial_aluno.php" class="footer-link">Home</a>
                </li>
                <li>
                    <a href="#" class="footer-link">Página de Login</a>
                </li>
                <li>
                    <a href="#" class="footer-link">Página de Cadastro</a>
                </li>
            </ul>

            <ul class="footer-list">
                <li>
                    <h3>Contato</h3>
                </li>
                <li>
                    <a href="#" class="footer-link">Whatsapp</a>
                </li>
                <li>
                    <a href="#" class="footer-link">email@gmail.com</a>
                </li>
            </ul>

            <div id="footer_subscribe">
                <h3>Newsletter</h3>

                <p>
                    Gostaria de ficar por dentro das novidades?
                </p>

                <div id="input_group">
                    <input type="email" id="email" placeholder="Insira seu e-mail...">
                    <button>
                        <i class="fa-regular fa-envelope"></i>
                    </button>
                </div>
            </div>
        </div>

        <div id="footer_copyright">
            &#169 2023 - ProFinder | Todos os direitos reservados
        </div>
    </footer>
    <script src="js/index2.js"></script>
    <script src="js/hamburguer2.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    
</body>

</html>

<!-- Menu -->
    <!-- <input type="checkbox" id="menu-toggle" class="menu-toggle">
        <div class="menu">
            <a href="#">Home</a>
            <a href="#">Sobre</a>
            <a href="#">Contato</a>
        </div> -->