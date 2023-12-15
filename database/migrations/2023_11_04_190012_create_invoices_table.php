<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('invoice_number');
            $table->date('invoice_Date')->nullable();
            $table->date('Due_date')->nullable();
            $table->string('product');

            $table->bigInteger('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('sections')->cascadeOnDelete();
            // $table->foreignId('section_id')->constrained('sections');
           // $table->string('section_id');
            // $table->decimal('Amount_collection',8,2);
            $table->decimal('Amount_commission',8,2);
            $table->string('Discount');
            $table->decimal('Value_vat',8,2);
            $table->string('Rate_vat');

            $table->decimal('Total',8,2); //8 is max  2الرقم اللى بعد العلامه
            // $table->string('Status',50); //فى حالة مكتبتش حاجه هيحط 255
            // $table->integer('value_status');
            $table->text('note')->nullable();
            // $table->date('Payment_Date')->nullable();
            // $table->string('user');
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
