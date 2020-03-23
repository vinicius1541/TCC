<?php
include_once('../includes/header.php');
include_once('../includes/connectDB.php');
if ($_SESSION['nivelacesso'] != 2) {
    header('Location: logged.php');
    exit;
}

if (isset($_GET['id'])) :
    $funcionario_id = mysqli_escape_string($connection, $_GET['id']);
    $sql = "SELECT * FROM funcionarios f INNER JOIN usuarios u ON u.funcionario_id = f.funcionario_id AND f.funcionario_id='{$funcionario_id}'";
    $resultado = mysqli_query($connection, $sql);
    $dados = mysqli_fetch_array($resultado);
endif;
?>
<div class="container">
    <div class="row">
        <div class="col-sm-auto col-md-auto col-lg-auto mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Visualizando: <?= $dados['nome']; ?></h5>
                    <form class="form-signin" action="#">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input name="nome" type="text" class="form-control" id="inputNome" value="<?= $dados['nome']; ?>" placeholder="Nome" autocomplete="off" disabled>
                                <label for="inputNome">nome</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-label-group">
                                    <input name="usuario" type="text" class="form-control" id="inputUsuario" value="<?= $dados['usuario']; ?>" placeholder="Usuário" autocomplete="off" disabled>
                                    <label for="inputUsuario">Usuário</label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-label-group">
                                    <input name="dtEntrada" type="text" class="form-control" id="inputDtEntrada" value="<?= date('d/m/Y H:m', strtotime($dados['dtEntrada'])); ?>" placeholder="Usuário" autocomplete="off" disabled>
                                    <label for="inputDtEntrada">Data de entrada</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input name="email" type="email" class="form-control" id="inputEmail" value="<?= $dados['email']; ?>" placeholder="Email" autocomplete="off" disabled>
                                <label for="inputEmail">E-mail</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input name="end" type="text" class="form-control" id="inputAddress" value="<?= $dados['endereco']; ?>" placeholder="Endereço" autocomplete="off" disabled>
                                <label for="inputAddress">Endereço</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input name="cel" type="number" class="form-control" id="inputPhone" value="<?= $dados['celular']; ?>" placeholder="Celular" autocomplete="off" disabled>
                                <label for="inputPhone">Celular</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-label-group">
                                    <input name="cpf" type="number" class="form-control" id="inputCpf" value="<?= $dados['cpf']; ?>" placeholder="CPF" autocomplete="off" disabled>
                                    <label for="inputCpf">CPF</label>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <div class="form-label-group">
                                    <input name="rg" type="number" class="form-control" id="inputRg" value="<?= $dados['rg']; ?>" placeholder="RG" autocomplete="off" disabled>
                                    <label for="inputRg">RG</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="form-label-group">
                                <?php 
                                    if($dados['nivelacesso_id'] == 0){
                                        $nivelAcesso = "NEGADO";
                                    }elseif($dados['nivelacesso_id'] == 1){
                                        $nivelAcesso = "Funcionario";
                                    }elseif($dados['nivelacesso_id'] == 2){
                                        $nivelAcesso = "Admin";
                                    }
                                ?>
                                <input type="text" name="nivel" id="inputNvlAcesso" value="<?=$nivelAcesso;?>" class="form-control" disabled>
                                <label for="inputNvlAcesso">Nivel de Acesso</label>
                            </div>
                        </div>
                        <a href="listarCadastros.php"><button type="button" class="btn btn-lg text-uppercase btn-primary btn-block">Voltar</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once('../includes/footer.php');
?>