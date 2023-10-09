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
        Schema::create('personal_detail', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->unsignedBigInteger('user_id')->index()->default(0);
            $table->string('first_name',50);
            $table->string('middle_name', 50)->nullable();
            $table->string('last_name',50);
            $table->date('date_of_birth')->nullable();
            $table->string('mobile_no', 20)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('gender', 50)->nullable();
            $table->string('aadhaar_no', 50)->nullable();
            $table->text('address')->nullable();
            $table->date('retirement_date')->nullable(); 
            $table->string('live_photo'); 
            $table->string('live_video'); 
            $table->string('passport_photo')->nullable();
            $table->string('aadhaar_card')->nullable();
            $table->string('pan_card')->nullable();
            $table->string('bank_passbook')->nullable();
            $table->string('status')->nullable();
            $table->string('reject_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_detail');
    }
};
