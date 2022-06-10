<?php namespace Tests\Repositories;

use App\Models\Bill;
use App\Repositories\BillRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BillRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BillRepository
     */
    protected $billRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->billRepo = \App::make(BillRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bill()
    {
        $bill = Bill::factory()->make()->toArray();

        $createdBill = $this->billRepo->create($bill);

        $createdBill = $createdBill->toArray();
        $this->assertArrayHasKey('id', $createdBill);
        $this->assertNotNull($createdBill['id'], 'Created Bill must have id specified');
        $this->assertNotNull(Bill::find($createdBill['id']), 'Bill with given id must be in DB');
        $this->assertModelData($bill, $createdBill);
    }

    /**
     * @test read
     */
    public function test_read_bill()
    {
        $bill = Bill::factory()->create();

        $dbBill = $this->billRepo->find($bill->id);

        $dbBill = $dbBill->toArray();
        $this->assertModelData($bill->toArray(), $dbBill);
    }

    /**
     * @test update
     */
    public function test_update_bill()
    {
        $bill = Bill::factory()->create();
        $fakeBill = Bill::factory()->make()->toArray();

        $updatedBill = $this->billRepo->update($fakeBill, $bill->id);

        $this->assertModelData($fakeBill, $updatedBill->toArray());
        $dbBill = $this->billRepo->find($bill->id);
        $this->assertModelData($fakeBill, $dbBill->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bill()
    {
        $bill = Bill::factory()->create();

        $resp = $this->billRepo->delete($bill->id);

        $this->assertTrue($resp);
        $this->assertNull(Bill::find($bill->id), 'Bill should not exist in DB');
    }
}
