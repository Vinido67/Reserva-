<?php

namespace App;

class Emprestimo
{
    public $id;
    public $item;
    public $servidor;
    public $data_emprestimo;
    public $data_devolucao;

    public function cadastrar()
    {
        return (new DataBase('emprestimo'))->insert([
            'id_item' => $this->item->id,
            'id_servidor' => $this->servidor->id,
            'data_emprestimo' => $this->data_emprestimo,
            'data_devolucao' => $this->data_devolucao
        ]);
    }

    public function alterar()
    {
        return (new DataBase('emprestimo'))->update('id = ' . (int) $this->id, [
            'id_item' => $this->item->id,
            'id_servidor' => $this->servidor->id,
            'data_emprestimo' => $this->data_emprestimo,
            'data_devolucao' => $this->data_devolucao
        ]);
    }

    public function excluir()
    {
        return (new DataBase('emprestimo'))->delete('id = ' . (int) $this->id);
    }

    public static function listar()
{
    $emprestimos = (new DataBase('emprestimo'))
        ->select()
        ->fetchAll(\PDO::FETCH_CLASS, self::class);

    foreach ($emprestimos as $emprestimo) {
        $emprestimo->item = Item::buscarPorId($emprestimo->id_item);
        $emprestimo->servidor = Servidor::buscarPorId($emprestimo->id_servidor);
    }

    return $emprestimos;
}

    public static function buscarPorId($id)
    {
       $emprestimo = (new DataBase('emprestimo'))->select('id = ' . (int) $id)
            ->fetchObject(self::class);
            $emprestimo->item = Item::buscarPorId($emprestimo->id_item);
            $emprestimo->servidor = Servidor::buscarPorId($emprestimo->id_servidor);
            return $emprestimo;
    }

    
}
