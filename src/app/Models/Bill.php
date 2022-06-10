<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Bill
 * @package App\Models
 * @version June 10, 2022, 5:17 pm UTC
 *
 * @property string $originalId
 * @property string $accountId
 * @property string $customerId
 * @property string $companyId
 * @property string $counterId
 * @property string $state
 * @property string $type
 * @property string $number
 * @property string $variableSymbol
 * @property string $createdUtc
 * @property string $issuedUtc
 * @property string $taxedUtc
 * @property string $paidUtc
 * @property string $dueUtc
 * @property string $notes
 * @property string $optionsDisplayCustomer
 * @property string $optionsDisplayTaxation
 * @property string $optionsTrackReceivable
 * @property string $DisplayCid
 * @property string $orderItems
 * @property string $paymentItems
 * @property string $assigneeData
 * @property string $italianFiscalCode
 */
class Bill extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'bills';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'originalId' => 'string',
        'accountId' => 'string',
        'customerId' => 'string',
        'companyId' => 'string',
        'counterId' => 'string',
        'state' => 'string',
        'type' => 'string',
        'number' => 'string',
        'variableSymbol' => 'string',
        'createdUtc' => 'string',
        'issuedUtc' => 'string',
        'taxedUtc' => 'string',
        'paidUtc' => 'string',
        'dueUtc' => 'string',
        'notes' => 'string',
        'optionsDisplayCustomer' => 'string',
        'optionsDisplayTaxation' => 'string',
        'optionsTrackReceivable' => 'string',
        'DisplayCid' => 'string',
        'orderItems' => 'string',
        'paymentItems' => 'string',
        'assigneeData' => 'string',
        'italianFiscalCode' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'originalId' => 'required|string|max:255',
        'accountId' => 'nullable|string|max:255',
        'customerId' => 'nullable|string|max:255',
        'companyId' => 'nullable|string|max:255',
        'counterId' => 'nullable|string|max:255',
        'state' => 'nullable|string|max:255',
        'type' => 'nullable|string|max:255',
        'number' => 'nullable|string|max:255',
        'variableSymbol' => 'nullable|string|max:255',
        'createdUtc' => 'nullable|string|max:255',
        'issuedUtc' => 'nullable|string|max:255',
        'taxedUtc' => 'nullable|string|max:255',
        'paidUtc' => 'nullable|string|max:255',
        'dueUtc' => 'nullable|string|max:255',
        'notes' => 'nullable|string|max:255',
        'optionsDisplayCustomer' => 'nullable|string|max:255',
        'optionsDisplayTaxation' => 'nullable|string|max:255',
        'optionsTrackReceivable' => 'nullable|string|max:255',
        'DisplayCid' => 'nullable|string|max:255',
        'orderItems' => 'nullable|string|max:255',
        'paymentItems' => 'nullable|string|max:255',
        'assigneeData' => 'nullable|string|max:255',
        'italianFiscalCode' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
