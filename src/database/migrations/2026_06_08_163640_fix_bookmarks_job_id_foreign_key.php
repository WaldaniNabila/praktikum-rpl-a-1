<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookmarks', function (Blueprint $table) {
            $table->dropForeign('bookmarks_job_id_foreign');

            $table->foreign('job_id')
                  ->references('id')
                  ->on('job_listings')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('bookmarks', function (Blueprint $table) {
            $table->dropForeign('bookmarks_job_id_foreign');

            $table->foreign('job_id')
                  ->references('id')
                  ->on('jobs')
                  ->onDelete('cascade');
        });
    }
};