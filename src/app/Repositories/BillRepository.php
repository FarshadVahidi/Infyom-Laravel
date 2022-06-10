<?php

namespace App\Repositories;

use App\Models\Bill;
use App\Repositories\BaseRepository;

/**
 * Class BillRepository
 * @package App\Repositories
 * @version June 10, 2022, 5:17 pm UTC
*/

class BillRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Bill::class;
    }
}
