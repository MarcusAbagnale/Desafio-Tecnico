
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Desafio</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/all.min.css">

</head>
<body class="is-preload">
    <div id="wrapper">
        <div id="main">
            <div class="inner">
                <header id="header">
                    <a href="index.html" class="logo">Desafio Técnico</a>
                </header>
                <section id="banner">
                    <div class="content">

                        <?php
                        require_once 'rotas.php';
                        ?>

                    </div>
                </section>
            </div>
        </div>

        <div id="sidebar">
            <div class="inner">

                <nav id="menu">
                    <header class="major">
                        <h2>Menu</h2>
                    </header>
                    <ul>
                        <li><a href="?action=listarCargos">Cargos</a></li>
                        <li><a href="?action=listarFuncionarios">Funcionários</a></li>

                    </ul>
                </nav>

                <footer id="footer">
                    <p class="copyright">&copy; Desafio.</br> Designer: <a target="_blank" href="https://www.linkedin.com/in/marcusdelima/">Marcus Lima</a>.</p>
                </footer>

            </div>
        </div>

    </div>



</body>
</html>





