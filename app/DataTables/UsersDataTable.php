<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */

    public function dataTable($query)
    {

        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($each) {
                $buttons = '<div class="btn-group">
                                <a href="javascript:void(0);" data-toggle="modal" data-title="'. $each->name .'" data-id="'. $each->id .'" data-target="#user-modal" title="Edit user details" class="btn btn-default"><i class="fas fa-edit"></i></a>';
                if($each->is_active)
                    $buttons .= '<a href="javascript:void(0);" onclick="updateUser(0, '. $each->id .');" title="Block user" class="btn btn-default"><i class="fas fa-minus-square"></i></a>';
                if( !$each->is_active )
                    $buttons .= '<a href="javascript:void(0);" onclick="updateUser(1, '. $each->id .');" title="Unblock user"  class="btn btn-default"><i class="fas fa-check-circle"></i></a>';
                $buttons .='</div>';
                return $buttons;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
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
                    ->setTableId('users-table')
                    ->columns($this->getColumns())
                    ->parameters([
                        "responsive" => true,
                        "autoWidth" => false,
                        "rowCallback" => 'function(row, data) {
                            if (data[\'is_active\'] == 0) {
                                $(row).css("text-decoration", "line-through");
                            }
                        }',
                    ])
                    ->minifiedAjax()
                    ->dom('Blfrtip')
                    ->orderBy([1, 'asc']);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('email'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                //   ->width(60)
                  ->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}
