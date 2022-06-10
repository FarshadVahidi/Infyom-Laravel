<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Bill;

class BillApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bill()
    {
        $bill = Bill::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bills', $bill
        );

        $this->assertApiResponse($bill);
    }

    /**
     * @test
     */
    public function test_read_bill()
    {
        $bill = Bill::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/bills/'.$bill->id
        );

        $this->assertApiResponse($bill->toArray());
    }

    /**
     * @test
     */
    public function test_update_bill()
    {
        $bill = Bill::factory()->create();
        $editedBill = Bill::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bills/'.$bill->id,
            $editedBill
        );

        $this->assertApiResponse($editedBill);
    }

    /**
     * @test
     */
    public function test_delete_bill()
    {
        $bill = Bill::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bills/'.$bill->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bills/'.$bill->id
        );

        $this->response->assertStatus(404);
    }
}
