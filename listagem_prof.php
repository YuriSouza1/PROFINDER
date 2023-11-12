<?php 

    session_start();
    if(empty($_SESSION)){
        print "<script>location.href=index.php';</script>";
    }
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>ProFinder | Visitar Perfil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='CSS/visitar.css'>
    
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
                    <p>Nome: <?php print $_SESSION["usuario"] ?> </p>
                    
                </div>
                <p class="conta">Conta do Aluno.</p>
                <p class="conta"> <?php print '<a href="logout.php"> SAIR </a>' ?> </p>
            </div>
        </section>
</header>
    <main style="flex-direction:column">
    <?php       
include('conexao.php');
if (isset($_GET['formacao'])) {
    // Checa a conexão
    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    $formacao = mysqli_real_escape_string($conn, $_GET['formacao']);

    $sql = "SELECT * FROM professor WHERE formacao = '$formacao'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Exibe as informações da formação
        echo '<h1 id="h1">Professores de ';
        if ($formacao == 'historia') {
            echo 'História';
        } elseif ($formacao == 'geografia') {
            echo 'Geografia';
        } elseif ($formacao == 'matematica') {
            echo 'Matemática';
        } elseif ($formacao == 'portugues') {
            echo 'Português';
        };
        echo '</h1><div class="card-container">';

        while ($row = mysqli_fetch_assoc($result)) {   
            echo '
            <div class="card">
                <div class="div-usuario">
                    <img class="user2" src="Imagens/user.png" alt="">
                    <p>'.$row['usuario'].'</p>
                </div>
                <div class="info-user">
                    <p><b>Contato:</b><br/>'.$row['contato'].'</p>   
                    <p><b>E-mail:</b><br/>'.$row['email'].'</p>    
                    <p><b>Certificado:</b><br/>'.$row['certificados'].'</p>   
                    <p><b>Instituição:</b><br/>'.$row['instituicoes'].'</p>         
                    <button type="submit"> <a href="https://mail.google.com/mail/u/0/#inbox?compose=new"target="_blank">Enviar Mensagem</a> </button>
                </div>
            </div>';
        }
    } else {
        echo "0 resultados";
    }

    // Fecha a conexão
    mysqli_close($conn);
} else {
    echo "Formação não especificada.";
}
?>  
           
                 
        </div>

    </main>

    <footer>
        <div id="footer_content">
            <div id="footer_contacts">
                <h1>Logo</h1>
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
                    <a href="#" class="footer-link">Home</a>
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

    <script src="js/hamburguer.js"></script>
    <script src="js/index.js"></script>
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