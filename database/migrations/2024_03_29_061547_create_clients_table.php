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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('gender',['male','female'])->default('male'); 
            $table->string('linkedIn')->nullable()->url();
            $table->string('instagram')->nullable()->url();
            $table->string('facebook')->nullable()->url();
            $table->string('X')->nullable()->url();
            $table->string('phone')->nullable(); 
            $table->date('birthday')->nullable(); 
            $table->string('city')->nullable(); 
            $table->text('bio')->nullable(); 
            $table->timestamp('joined_at')->default(now());
            $table->boolean('is_banned')->default(false); 
            $table->boolean('can_post')->default(false); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
