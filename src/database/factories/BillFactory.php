<?php

namespace Database\Factories;

use App\Models\Bill;
use Illuminate\Database\Eloquent\Factories\Factory;

class BillFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bill::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'originalId' => $this->faker->word,
        'accountId' => $this->faker->word,
        'customerId' => $this->faker->word,
        'companyId' => $this->faker->word,
        'counterId' => $this->faker->word,
        'state' => $this->faker->word,
        'type' => $this->faker->word,
        'number' => $this->faker->word,
        'variableSymbol' => $this->faker->word,
        'createdUtc' => $this->faker->word,
        'issuedUtc' => $this->faker->word,
        'taxedUtc' => $this->faker->word,
        'paidUtc' => $this->faker->word,
        'dueUtc' => $this->faker->word,
        'notes' => $this->faker->word,
        'optionsDisplayCustomer' => $this->faker->word,
        'optionsDisplayTaxation' => $this->faker->word,
        'optionsTrackReceivable' => $this->faker->word,
        'DisplayCid' => $this->faker->word,
        'orderItems' => $this->faker->word,
        'paymentItems' => $this->faker->word,
        'assigneeData' => $this->faker->word,
        'italianFiscalCode' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
