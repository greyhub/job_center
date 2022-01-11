<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('title');
            $table->string('slug');
            $table->longText('image_url');
            $table->integer('city_id');
            $table->string('update_time');
            $table->string('salary');
            $table->string('job_experience_years');
            $table->string('application_deadline');
            $table->string('required_gender_specific');
            $table->string('sectors');
            $table->string('job_attributes');
            $table->string('job_formality');
            $table->longText('job_descriptions');
            $table->longText('job_requirements');
            $table->string('company_name');
            $table->longText('company_address');
            $table->string('company_url');
            $table->string('timestamp_isodate');
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
        Schema::dropIfExists('jobs');
    }
}
