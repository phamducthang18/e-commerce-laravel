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
        Schema::create('delivery_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('consignee_name');
            $table->string('phone_number');
            $table->string('specific'); // Ví dụ: Số nhà, tòa nhà
            $table->string('street');   // Ví dụ: Đường, khu phố
            $table->foreignId('wards_id')->constrained('wards')->onDelete('cascade'); 
            $table->foreignId('districts_id')->constrained('districts')->onDelete('cascade'); 
            $table->foreignId('provinces_id')->constrained('provinces')->onDelete('cascade'); 
            $table->boolean('is_default');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_address');
    }
};
