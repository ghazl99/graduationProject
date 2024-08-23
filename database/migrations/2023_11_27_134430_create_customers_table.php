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
    Schema::create('customers', function (Blueprint $table) {
      $table->id();
      $table->string('national_id', 15);
      $table->string('first_name', 50);
      $table->string('middle_name', 50);
      $table->string('last_name', 50);
      $table->text('address');
      $table->string('phone', 15);
      $table->string('email', 50);
      $table->timestamp('date_created');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('customers');
  }
};
