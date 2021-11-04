<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('name_gr');
            $table->unsignedFloat('area');
            $table->string('reference');
            $table->string('feminizations');
            $table->enum('type', ['house', 'apartment']);
            $table->enum('offer_type', ['sale', 'rent', 'both']);
            $table->unsignedInteger('bedroom')->default(0);
            $table->unsignedInteger('bathroom')->default(0);
            $table->timestamp('date_added');
            $table->string('address');
            $table->double('price', 8, 2);
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_gr')->nullable();
            $table->string('city');
            $table->string('location_latitude');
            $table->string('location_longitude');
            $table->string('image')->nullable();
            $table->enum('status', ['under_constraction', 'ready']);
            $table->integer('gate');
            //forignK
            $table->foreignId('community_id')->constrained('communities')->cascadeOnDelete();
            $table->foreignId('owner_id')->nullable()->constrained('owners')->cascadeOnDelete();
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
        Schema::dropIfExists('properties');
    }
}
