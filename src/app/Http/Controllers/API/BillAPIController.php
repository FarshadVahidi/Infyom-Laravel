<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBillAPIRequest;
use App\Http\Requests\API\UpdateBillAPIRequest;
use App\Models\Bill;
use App\Repositories\BillRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BillController
 * @package App\Http\Controllers\API
 */

class BillAPIController extends AppBaseController
{
    /** @var  BillRepository */
    private $billRepository;

    public function __construct(BillRepository $billRepo)
    {
        $this->billRepository = $billRepo;
    }

    /**
     * Display a listing of the Bill.
     * GET|HEAD /bills
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $bills = $this->billRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($bills->toArray(), 'Bills retrieved successfully');
    }

    /**
     * Store a newly created Bill in storage.
     * POST /bills
     *
     * @param CreateBillAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBillAPIRequest $request)
    {
        $input = $request->all();

        $bill = $this->billRepository->create($input);

        return $this->sendResponse($bill->toArray(), 'Bill saved successfully');
    }

    /**
     * Display the specified Bill.
     * GET|HEAD /bills/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Bill $bill */
        $bill = $this->billRepository->find($id);

        if (empty($bill)) {
            return $this->sendError('Bill not found');
        }

        return $this->sendResponse($bill->toArray(), 'Bill retrieved successfully');
    }

    /**
     * Update the specified Bill in storage.
     * PUT/PATCH /bills/{id}
     *
     * @param int $id
     * @param UpdateBillAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBillAPIRequest $request)
    {
        $input = $request->all();

        /** @var Bill $bill */
        $bill = $this->billRepository->find($id);

        if (empty($bill)) {
            return $this->sendError('Bill not found');
        }

        $bill = $this->billRepository->update($input, $id);

        return $this->sendResponse($bill->toArray(), 'Bill updated successfully');
    }

    /**
     * Remove the specified Bill from storage.
     * DELETE /bills/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Bill $bill */
        $bill = $this->billRepository->find($id);

        if (empty($bill)) {
            return $this->sendError('Bill not found');
        }

        $bill->delete();

        return $this->sendSuccess('Bill deleted successfully');
    }
}
