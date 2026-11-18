
<?php
include("../../vendor/autoload.php");
include("../includes/cabecalho.php");
include("../includes/Menu.php");

use App\Emprestimo;

$emprestimos = Emprestimo::listar();
?>

<main class="container">

    <h2 class="text-center">Lista de Empréstimos</h2>

    <div class="my-3">
        <a href="/reserva/view/emprestimo/cadastrar.php" class="btn btn-success btn-sm">
            Cadastrar Empréstimo
        </a>
    </div>

    <table class="table table-hover table-sm">

        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Item</th>
                <th>Servidor</th>
                <th>Data Empréstimo</th>
                <th>Data Devolução</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($emprestimos as $emprestimo): ?>
                <tr>
                    <td><?= $emprestimo->id ?></td>
                    <td><?= $emprestimo->item ? $emprestimo->item->nome : '' ?></td>
                    <td><?= $emprestimo->servidor ? $emprestimo->servidor->nome : '' ?></td>
                    <td><?= date('d/m/Y - H:i', strtotime($emprestimo->data_emprestimo)) ?></td>
                    <td><?= $emprestimo->data_devolucao ? date('d/m/Y - H:i', strtotime($emprestimo->data_devolucao)) : 'Pendente' ?></td>
                    <td>
                        <a href="/reserva/view/emprestimo/alterar.php?id=<?= $emprestimo->id ?>" class="btn btn-primary btn-sm">Editar</a>

                        <a href="/reserva/action/action_emprestimo.php?action=excluir&id=<?= $emprestimo->id ?>"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Deseja excluir este empréstimo?')">
                            Excluir
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

</main>

<?php include("../includes/rodape.php"); ?>
