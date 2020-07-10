<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibraryFoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('library_folders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('library_id');
            $table->string('path');
            $table->timestamps();

            $table->foreign('library_id')->references('id')->on('libraries')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('library_folders');
    }
}
