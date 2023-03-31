<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) 
        {
                $table->id()->index()->autoIncrement();
                $table->string('title')->nullable();
                $table->string('author')->nullable();
                $table->string('genre')->nullable();
                $table->string('description')->nullable();
                $table->string('isbn')->nullable();
                $table->string('image')->nullable();
                $table->string('publisher')->nullable();
                $table->date('published')->nullable();
                $table->unsignedBigInteger('created_by')->nullable();
                $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict');
                $table->unsignedBigInteger('updated_by')->nullable();
                $table->foreign('updated_by')->references('id')->on('users')->onDelete('restrict');
                $table->softDeletes();

                // $table->boolean('status');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');

    }
};
