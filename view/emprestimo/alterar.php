
<?php

use App\Emprestimo;
use App\Item;
use App\Servidor;

include("../../vendor/autoload.php");

include("../includes/cabecalho.php");
include("../includes/Menu.php");

$emprestimo = Emprestimo::buscarPorId($_GET['id']);
$itens = Item::listar();
$servidores = Servidor::listar();

?>

<main class="container">

    <form action="/reserva/action/action_emprestimo.php?action=alterar&id=<?= $emprestimo->id ?>" method="post">

        Item * :
        <select name="item" required class="form-control">
            <?php foreach ($itens as $item): ?>
                <option value="<?= $item->id ?>" <?= $emprestimo->item->id == $item->id ? 'selected' : '' ?>>
                    <?= $item->nome ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        Servidor :
        <select name="servidor" class="form-control">
            <option value="">Nenhum</option>
            <?php foreach ($servidores as $servidor): ?>
                <option value="<?= $servidor->id ?>" <?= $emprestimo->servidor && $emprestimo->servidor->id == $servidor->id ? 'selected' : '' ?>>
                    <?= $servidor->nome ?>
                </option>
            <?php endforeach; ?>
        </select><br>

         Data Empréstimo * : <input type="datetime-local" name="data_emprestimo" required class="form-control"><br>
        Data Devolução * : <input type="datetime-local" name="data_devolucao" required class="form-control"><br>

        <input type="submit" value="Alterar" class="btn btn-primary">

    </form>

</main>

<?php include("../includes/rodape.php"); ?>
