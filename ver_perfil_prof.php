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
    <title>ProFinder | Página de Perfil (Professor)</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='CSS/perfilprofessor.css'>
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
                        <li><a href="tela_inicial_professor.php">Home</a></li>
                        <li><a href="ver_perfil_prof.php">Ver perfil</a></li>
                        <li><a href="editar_perfil_prof.php">Editar perfil</a></li>
                        <li><a href="landing_pageP.php">Sobre o site</a></li>
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
                    <p>Nome:<?php print $_SESSION["usuario"]?> </p>
                    
                </div>
                <p class="conta">Conta do Professor.</p>
                <p class="conta"> <?php print '<a href="logout.php"> SAIR </a>' ?> </p>
            </div>
        </section>

    <main>
        <div class="main-container">
            <div class="div-01">
                <ul class="ul-div-01">
                    <li><img src="Imagens/User.png" width="150px" height="150px"></li>
                    <li>
                        <div class="div-info">
                            <ul class="ul-info">
                                <li><h1><?php print $_SESSION["usuario"]?></h1></li>

                                <li><p class="legenda">Formação: <?php print $_SESSION["formacao"]?> </p></li>
                                
                                <li><p class="legenda">Instituição de ensino: <?php print $_SESSION["instituicoes"]?> </p></li>

                                <li><p class="legenda">Certificados: <?php print $_SESSION["certificados"]?> </p></li>
                                
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        
            <div class="result-sobre">
                <?php  print $_SESSION["sobremim"]?>
            </div>

            <button type="submit" id="btn" ><a href="perfilaluno.html" id="legenda2">Entrar em contato</a></button>
            
        </div>   
    </main>

    <footer>
        <div id="footer_content">
            <div id="footer_contacts">
                <img src="Imagens/logo.png" alt="logo" id="logo">
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
                    <a href="tela_inicial_professor.php" class="footer-link">Home</a>
                </li>
                <li>
                    <a href="" class="footer-link">Página de Login</a>
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
                <h3>propagandas do site</h3>

                <p>
                Gostaria de participar das propagandas do site?
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

    <script src="js/hamburguer3.js"></script>
    <script src="js/index3.js"></script>
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