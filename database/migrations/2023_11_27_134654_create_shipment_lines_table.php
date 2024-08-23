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
    Schema::create('shipment_lines', function (Blueprint $table) {
      $table->id('shipment_line_id');
      $table->unsignedBigInteger('request_id');
      $table->unsignedBigInteger('category_detail_id');
      $table->integer('quantity')->unsigned();
      $table->string('description', 100)->nullable();

      $table
        ->foreign('request_id')
        ->references('request_id')
        ->on('shipping_requests')
        ->onDelete('cascade');

      $table
        ->foreign('category_detail_id')
        ->references('id')
        ->on('category_details')
        ->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('shipment_lines');
  }
};
