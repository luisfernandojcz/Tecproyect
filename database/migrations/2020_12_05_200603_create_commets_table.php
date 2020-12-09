<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->text('body');
            $table->enum('status',['PUBLISHED','DRAFT'])->default('DRAFT');
            $table->unsignedBigInteger('commentable_id');
            $table->string('commentable_type');
            $table->timestamps();
            $table->foreign('parent_id')
                    ->references('id')->on('commets')
                    ->onDelete('cascade');
            
                       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commets');
    }
}
