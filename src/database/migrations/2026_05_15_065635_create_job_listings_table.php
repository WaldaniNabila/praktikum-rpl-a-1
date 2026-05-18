<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('title', 150);
            $table->text('description');
            $table->text('requirements');
            $table->string('location', 100);
            $table->enum('employment_type', ['full-time', 'part-time', 'contract', 'internship']);
            $table->enum('work_type', ['remote', 'on-site', 'hybrid']);
            $table->integer('salary_min')->nullable();
            $table->integer('salary_max')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->boolean('is_open')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};