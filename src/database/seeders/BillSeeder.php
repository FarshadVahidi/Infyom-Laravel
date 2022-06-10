<?php

namespace Database\Seeders;

use Faker\Core\Number;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Integer;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 0;
        while($count < 50) {
            DB::table('bills')->insert([
                'originalId' => Str::random(10),
                'accountId' => Str::random(10),
                'customerId' => Str::random(10),
                'companyId' => Str::random(10),
                'counterId' => Str::random(10),
                'state' => 'Active',
                'type' => Str::random(3),
                'number' => Str::random(10),
                'variableSymbol' => Str::random(3),
                'createdUtc' => now(),
                'issuedUtc' => now(),
                'taxedUtc' => Str::random(10),
                'paidUtc' => Str::random(3),
                'dueUtc' => Str::random(3),
                'notes' => Str::random(20),
                'optionsDisplayCustomer' => true,
                'optionsDisplayTaxation' => true,
                'optionsTrackReceivable' => true,
                'DisplayCid' => Str::random(3),
                'orderItems' => Str::random(3),
                'paymentItems' => Str::random(3),
                'assigneeData' => Str::random(3),
                'italianFiscalCode' => Str::random(16),
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ]);
            $count++;
        }
    }
}
