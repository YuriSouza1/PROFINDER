<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>ProFinder | Página Inicial</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='CSS/inicial.css'>
</head>

<body>

    <main>
        <div class="div-main">
            <h1>Bem-vindo ao <span>ProFinder</span>!</h1>
            <p>Entre como:</p>
            <div class="div-escolha">
               <a href="entrada_aluno.html"> <div class="escolha-aluno">
                    <ul class="ul-aluno">
                        <li><img src="Imagens/aluno.png" width="90px" height="110px"></li>
                        <li><p>ALUNO</p></li>
                    </ul>
                </div></a>
                    <a href="entrada_prof.html"><div class="escolha-prof">
                    <ul class="ul-prof">
                        <li><img src="Imagens/professor.png" width="90px" height="110px"></li>
                        <li><p>PROFESSOR</p></li>
                    </ul>
                </div></a>
            </div>        
        </div>
    </main>

    <footer>
        <div id="footer_content">
            <div id="footer_contacts">
                <img src="Imagens/logo.png" alt="logo" width="100px" height="100px">
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

    <script src='JS/inicial.js'></script>
    
</body>

</html>

<!-- Menu -->
    <!-- <input type="checkbox" id="menu-toggle" class="menu-toggle">
        <div class="menu">
            <a href="#">Home</a>
            <a href="#">Sobre</a>
            <a href="#">Contato</a>
        </div> -->