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
        Schema::create('personal_documents', function (Blueprint $table) {
            $table->bigIncrements('document_id')->index();
            $table->unsignedBigInteger('personal_detail_id')->index()->default(0);
            $table->string('document_type',50)->default('');
            $table->string('document_path',255)->default('');
            $table->string('date_submited',255)->default('');
            $table->integer('date_updated')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_documents');
    }
};
