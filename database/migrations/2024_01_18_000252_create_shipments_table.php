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
    Schema::create('shipments', function (Blueprint $table) {
      $table->id();

      $table->unsignedBigInteger('driver_id');

      $table->unsignedBigInteger('vehicle_id');

      $table->unsignedBigInteger('shipping_request_id');

      $table->timestamps();

      $table
        ->foreign('driver_id')
        ->references('id')
        ->on('users');

      $table
        ->foreign('vehicle_id')
        ->references('id')
        ->on('vehicles');

      $table
        ->foreign('shipping_request_id')
        ->references('request_id')
        ->on('shipping_requests');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('shipments');
  }
};
