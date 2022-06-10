<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('originalId')->unique();
            $table->string('accountId')->nullable();
            $table->string('customerId')->nullable();
            $table->string('companyId')->nullable();
            $table->string('counterId')->nullable();
            $table->string('state')->nullable();
            $table->string('type')->nullable();
            $table->string('number')->nullable();
            $table->string('variableSymbol')->nullable();
            $table->string('createdUtc')->nullable();
            $table->string('issuedUtc')->nullable();
            $table->string('taxedUtc')->nullable();
            $table->string('paidUtc')->nullable();
            $table->string('dueUtc')->nullable();
            $table->string('notes')->nullable();
            $table->string('optionsDisplayCustomer')->nullable();
            $table->string('optionsDisplayTaxation')->nullable();
            $table->string('optionsTrackReceivable')->nullable();
            $table->string('DisplayCid')->nullable();
            $table->string('orderItems')->nullable();
            $table->string('paymentItems')->nullable();
            $table->string('assigneeData')->nullable();
            $table->string('italianFiscalCode')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
};
