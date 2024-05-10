<?php

namespace App\DataTables;

use App\Models\Chamados;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ChamadosDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($chamado) {
                $showUrl = route('chamados.show', $chamado->id);
                $deleteUrl = route('chamados.destroy', $chamado->id);
                return view('chamados.action', compact('deleteUrl', 'showUrl', 'chamado'));
            })
            ->addColumn('situacao', function ($chamado) {
                return $chamado->situacao->nm_situacao;
            })
            ->addColumn('categoria', function ($chamado) {
                return $chamado->categoria->nm_categoria;
            })
            ->addColumn('data_criacao', function ($chamado) {
                return $chamado->data_criacao_formatada;
            })
            ->addColumn('data_solucao', function ($chamado) {
                return $chamado->data_solucao_formatada;
            })
            ->addColumn('prazo_solucao', function ($chamado) {
                return $chamado->prazo_solucao_formatada;
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Chamados $model): QueryBuilder
    {
        return $model->newQuery()->with(['situacao', 'categoria']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('chamados-table')
            ->addTableClass('text-center table-striped table-responsive')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([
//                Button::make('excel'),
//                Button::make('csv'),
//                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('titulo')->title('Título'),
            Column::make('descricao')->title('Descrição'),
            Column::make('categoria')->title('Categoria'),
            Column::make('situacao')->title('Situacão'),
            Column::make('data_criacao')->title('Data de Criação'),
            Column::make('prazo_solucao')->title('Prazo de Solucao'),
            Column::make('data_solucao')->title('Data de Solucao'),
            Column::computed('action')->title('Ações')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Chamados_' . date('YmdHis');
    }
}
