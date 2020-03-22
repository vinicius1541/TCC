<?php
include_once '../includes/header.php';
include_once '../includes/connectDB.php';

if ($_SESSION['nivelacesso'] != 2) {
    header('Location: logged.php');
    exit;
}
$sql = "SELECT * FROM usuarios u INNER JOIN funcionarios f ON u.funcionario_id=f.funcionario_id";
$resultado = mysqli_query($connection, $sql);
?>
<div class="table-responsive">
    <table class="table table-hover table-dark table-striped table-bordered">
        <thead class="thead-dark ">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Usuario</th>
                <th scope="col">Data Entrada</th>
                <th scope="col">Celular</th>
                <th scope="col">Endereço</th>
                <th scope="col">Ativo</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($dados = $resultado->fetch_array()) : ?>
                <tr>
                    <th scope="row"><?php echo $dados['usuario_id'] ?></th>
                    <td><?php echo $dados['nome'] ?></td>
                    <td><?php echo $dados['usuario'] ?></td>
                    <td><?php echo date('d/m/Y', strtotime($dados['dtEntrada'])); ?></td>
                    <td><?php echo $dados['celular'] ?></td>
                    <td><?php echo $dados['endereco'] ?></td>
                    <td><?php echo $dados['ativo'] == 1 ? "Sim" : "Não"; ?></td>
                    <td>
                        <a href="#"><button type="button" class="btn btn-primary">Visualizar</button></a>
                        <a href="#"><button type="button" class="btn btn-success">Editar</button></a>
                        <a href="#"><button type="button" class="btn btn-danger">Excluir</button></a>
                    </td>
                </tr>
            <?php endwhile; ?>

        </tbody>
    </table>
</div>
<div class="col text-center">
    <a href="cadastrar.php"><button type="button" class=" btn btn-secondary btn-lg text-uppercase">Adicionar Funcionário</button></a><br><br><br>
</div>
<?php
include_once '../includes/footer.php';
mysqli_free_result($resultado);
mysqli_close($connection);
?>