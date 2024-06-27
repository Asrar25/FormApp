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
        Schema::create('generalinfo', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 20);
            $table->BigInteger('phone_number');
            $table->BigInteger('fax_number');
            $table->string('email',30);
            $table->string('position');
            $table->float('present_salary',8, 2);
            $table->float('salary_desire',8, 2);
            $table->date('date');
            $table->string('ptime/ftime',15);
            $table->string('llc_applied_sb',10);
            $table->string('where_applied');
            $table->string('find_sb',20);
            $table->string('legally_to_work',10);
            $table->string('sponsorship_employement',10);
            $table->string('convicted_crime',10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generalinfo');
    }
};
