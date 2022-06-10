<?php

namespace App\DataTables;

use App\Models\Bill;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class BillDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'bills.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Bill $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Bill $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'originalId',
            'accountId',
            'customerId',
            'companyId',
            'counterId',
            'state',
            'type',
            'number',
            'variableSymbol',
            'createdUtc',
            'issuedUtc',
            'taxedUtc',
            'paidUtc',
            'dueUtc',
            'notes',
            'optionsDisplayCustomer',
            'optionsDisplayTaxation',
            'optionsTrackReceivable',
            'DisplayCid',
            'orderItems',
            'paymentItems',
            'assigneeData',
            'italianFiscalCode'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'bills_datatable_' . time();
    }
}
