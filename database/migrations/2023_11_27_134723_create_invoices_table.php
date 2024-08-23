<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('invoices', function (Blueprint $table) {
      $table->id();
      $table->string('invoice_id', 6);

      $table->unsignedBigInteger('request_id');

      $table->date('invoice_date');

      $table->date('due_date');
      $table->double('amount', 10, 2);
      $table->string('payer');
      $table->timestamps();

      $table
        ->foreign('request_id')
        ->references('request_id')
        ->on('shipping_requests')
        ->onDelete('cascade');
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
