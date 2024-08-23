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
    Schema::create('shipping_requests', function (Blueprint $table) {
      $table->id('request_id');
      $table->unsignedBigInteger('sender_customer_id');
      $table->unsignedBigInteger('receiver_customer_id');
      $table->date('shipping_delivery');
      $table->unsignedBigInteger('source_id');
      $table->unsignedBigInteger('destination_id');

      $table
        ->foreign('source_id')
        ->references('id')
        ->on('addresses')
        ->onDelete('cascade');
        $table
        ->foreign('destination_id')
        ->references('id')
        ->on('addresses')
        ->onDelete('cascade');
      $table
        ->foreign('sender_customer_id')
        ->references('id')
        ->on('customers')
        ->onDelete('cascade');
      $table
        ->foreign('receiver_customer_id')
        ->references('id')
        ->on('customers')
        ->onDelete('cascade');

    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('shipping_requests');
  }
};
