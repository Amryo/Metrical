<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->string('title_ar');
            $table->string('title_en');
            $table->string('title_gr');

            $table->text('description_ar');
            $table->text('description_en');
            $table->text('description_gr');

            $table->string('address');

            $table->date('start_date');
            $table->date('end_date');

            $table->foreignId('community_id')->constrained('communities')->cascadeOnDelete();

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
        Schema::dropIfExists('events');
    }
}