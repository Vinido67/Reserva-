<?php
include("../../vendor/autoload.php");
include("../includes/cabecalho.php");
include("../includes/Menu.php");

use App\Item;
use App\Servidor;

$itens = Item::listar();
$servidores = Servidor::listar();
?>
<main class="container">
    <form action="/reserva/action/action_emprestimo.php?action=cadastrar" method="post">
        Item * : 
        <select name="item" required class="form-control">
            <option value="">Selecione um item</option>
            <?php foreach ($itens as $item): ?>
                <option value="<?= $item->id ?>"><?= $item->nome ?></option>
            <?php endforeach; ?>
        </select><br>

        Servidor : 
        <select name="servidor" class="form-control">
            <option value="">Nenhum / Sem servidor</option>
            <?php foreach ($servidores as $servidor): ?>
                <option value="<?= $servidor->id ?>"><?= $servidor->nome ?></option>
            <?php endforeach; ?>
        </select><br>

        Data Empréstimo * : <input type="datetime-local" name="data_emprestimo" required class="form-control"><br>
        Data Devolução * : <input type="datetime-local" name="data_devolucao" required class="form-control"><br>
        
        <input type="submit" value="Cadastrar" class="btn btn-primary">
    </form>
</main>
<?php
include("../includes/rodape.php");
?>