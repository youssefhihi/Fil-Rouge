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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
                    
            $table->string('title');
            $table->mediumText('description');
            $table->bigInteger('ISBN');
            $table->integer('edition');
            $table->date('publicationDate');
            $table->integer('PagesNumber'); 
            $table->integer('Quantity'); 
            $table->string('language'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
