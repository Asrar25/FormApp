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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('education_name');
            $table->string('locate');
            $table->date('date_attend');
            $table->string('major');
            $table->string('minor');
            $table->decimal('cgpa', 8, 2);
            $table->decimal('major_gpa', 8, 2);
            $table->integer('no_of_hrs_per_week');
            $table->string('course_name');
            $table->string('institue_name');
            $table->integer('credit_hrs');
            $table->char('grade', 10);
            $table->integer('SAT_verbal');
            $table->integer('GRE_verbal');
            $table->integer('ACT');
            $table->integer('SAT_math');
            $table->integer('GRE_math');
            $table->integer('LSAT');
            $table->integer('SAT_Total');
            $table->integer('GRE_Total');
            $table->integer('GMAT');
            $table->string('scholarship');
            $table->string('CPA_status');
            $table->string('state');
            $table->string('license_no');
            $table->string('active');
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
        Schema::dropIfExists('education');
    }
};
