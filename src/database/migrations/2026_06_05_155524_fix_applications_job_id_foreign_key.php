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
        Schema::table('applications', function (Blueprint $table) {
            // Drop the incorrect foreign key that references 'jobs' table
            $table->dropForeign('applications_job_id_foreign');
            
            // Create the correct foreign key that references 'job_listings' table
            $table->foreign('job_id')->references('id')->on('job_listings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            // Drop the correct constraint
            $table->dropForeign('applications_job_id_foreign');
            
            // Recreate the old (incorrect) constraint for rollback
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
        });
    }
};
