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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            // add columns title
            $table->string('title');

            // add columns description
            $table->text('description')->nullable();

            // add columns dueDate
            $table->date('duedate')->nullable();

            // add columns status with [to do ,in progress and done]
            $table->enum('status', ['to do', 'in progress', 'done'])->default('to do');

            // add columns deadline and reminder
            // $table->dateTime('deadline')->nullable();
            // $table->dateTime('reminder')->nullable();

            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
