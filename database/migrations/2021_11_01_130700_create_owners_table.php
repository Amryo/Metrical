<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users', 'id')->cascadeOnDelete();
            $table->foreignId('community_id')->constrained('community', 'id')->cascadeOnDelete();
            $table->string('passport_copy')->nullable();
            $table->string('title_dead_copy');
            $table->string('emirate_id')->nullable();
            $table->unsignedInteger('unit_number')->nullable();
            $table->unsignedInteger('renting_price');
            $table->boolean('direct');
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
        Schema::dropIfExists('owners');
    }
}
