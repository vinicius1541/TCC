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
                    <?php
                    if (isset($_SESSION['sucesso'])) :
                    ?>
                        <div class='alert alert-success'>
                            <p><?= $_SESSION['msg'] ?></p>
                        </div>
                    <?php
                    elseif (isset($_SESSION['erro'])) :
                    ?>
                        <div class='alert alert-danger'>
                            <p><?= $_SESSION['msg'] ?></p>
                        </div>

                    <?php
                    endif;
                    unset($_SESSION['erro']);
                    unset($_SESSION['sucesso']); ?>
                    <h5 class="card-title text-center">Editando: <?= $dados['nome']; ?></h5>
                    <form class="form-signin" action="updateCadastro.php" method="POST">
                        <input name="funcionario_id" type="hidden" value="<?= $dados['funcionario_id']; ?>" id="inputID">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input name="nome" type="text" class="form-control" id="inputNome" value="<?= $dados['nome']; ?>" placeholder="Nome" autocomplete="off">
                                <label for="inputNome">nome</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="form-label-group">
                                    <input name="usuario" type="text" class="form-control" id="inputUsuario" value="<?= $dados['usuario']; ?>" placeholder="Usuário" autocomplete="off">
                                    <label for="inputUsuario">Usuário</label>
                                </div>
                            </div>
                            <input name="senha" type="hidden" value="<?= $dados['senha']; ?>" id="inputID">
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input name="email" type="email" class="form-control" id="inputEmail" value="<?= $dados['email']; ?>" placeholder="Email" autocomplete="off">
                                <label for="inputEmail">E-mail</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input name="end" type="text" class="form-control" id="inputAddress" value="<?= $dados['endereco']; ?>" placeholder="Endereço" autocomplete="off">
                                <label for="inputAddress">Endereço</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input name="cel" type="number" class="form-control" id="inputPhone" value="<?= $dados['celular']; ?>" placeholder="Celular" autocomplete="off">
                                <label for="inputPhone">Celular</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-label-group">
                                    <input name="cpf" type="number" class="form-control" id="inputCpf" value="<?= $dados['cpf']; ?>" placeholder="CPF" autocomplete="off">
                                    <label for="inputCpf">CPF</label>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <div class="form-label-group">
                                    <input name="rg" type="number" class="form-control" id="inputRg" value="<?= $dados['rg']; ?>" placeholder="RG" autocomplete="off">
                                    <label for="inputRg">RG</label>
                                </div>
                            </div>
                            <input name="ativo" type="hidden" id="inputAtivo" value="<?= $dados['ativo']; ?>">
                        </div>
                        <div class="form-group">
                            <?php
                            $nvlAcessoNeg = "";
                            $nvlAcessoFunc = "";
                            $nvlAcessoAdm = "";
                            if ($dados['nivelacesso_id'] == 0) :
                                $nvlAcessoNeg = "selected";
                            elseif ($dados['nivelacesso_id'] == 1) :
                                $nvlAcessoFunc = "selected";
                            elseif ($dados['nivelacesso_id'] == 2) :
                                $nvlAcessoAdm = "selected";

                            endif;
                            ?>
                            <div class="form-label-group">
                                <select name="nivel" id="inputNvlAcesso" class="form-control">
                                    <option value="0" <?= $nvlAcessoNeg ?>>Acesso NEGADO</option>
                                    <option value="1" <?= $nvlAcessoFunc ?>>Funcionario</option>
                                    <option value="2" <?= $nvlAcessoAdm ?>>Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="col text-center">
                            <a href="listarCadastros.php"><button type="button" class="btn btn-lg text-uppercase btn-primary">Voltar</button></a>
                            <button name="btn-editar" type="submit" class="btn btn-lg text-uppercase btn-warning">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once('../includes/footer.php');
?>