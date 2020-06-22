<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('business_cateogy_id');
            $table->text('business_name');
            $table->text('business_image')->nullable();
            $table->text('business_hours')->nullable();            
            $table->text('business_location');
            $table->mediumText('business_address');
            $table->text('business_contact');
            $table->string('business_email');
            $table->text('business_website');
            $table->mediumText('business_description');
            $table->integer('view_count');
            $table->integer('status');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');

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
        Schema::dropIfExists('business_profiles');
    }
}
