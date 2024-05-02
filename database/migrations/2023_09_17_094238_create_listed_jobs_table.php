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
        Schema::create('listed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string("companyName");
            $table->string("position");
            $table->text("Description");
            $table->string("location");
            $table->string("salary");
            $table->string("vacancy");
            $table->string("deadline");
            $table->string("experience")->nullable();
            $table->string("gender");
            $table->string("type");
            $table->string("CompanyLogo");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listed_jobs');
    }
};
