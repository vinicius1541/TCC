<?php
$paginaLink = $_SERVER['SCRIPT_NAME'];
if ($paginaLink != '/OdontoMonicao/customers/cadastrar.php' && $paginaLink != '/OdontoMonicao/customers/listarCadastros.php') {
  echo "
    <footer id='sticky-footer' class='py-4 bg-dark text-white-50'>
      <div class='container text-center'>
        <small>Copyright &copy; 2020</small>
      </div>
    </footer>
  </body>
</html>";
}
