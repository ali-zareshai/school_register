<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('payment_id');

            $table->string('kelas');
            $table->string('gender');
            $table->string('name');
            $table->string('family_name');
            $table->string('student_father_name');
            $table->string('meli_code');
            $table->string("serial_ssn");
            $table->string('city_ssn');
            $table->timestamp('birth_date');
            $table->tinyInteger('several_children');
            $table->string('old_school')->nullable();
            $table->string('other_childern')->nullable();

            $table->string('father_type')->nullable();
            $table->string('father_name');
            $table->string('father_family_name');
            $table->string('father_father_name');
            $table->string('father_meli_code');
            $table->string("father_ssn");
            $table->string("father_serial_ssn");
            $table->string('father_city_ssn');
            $table->timestamp('father_birth_date');
            $table->string('father_education');
            $table->tinyInteger("father_job_type");
            $table->string("father_job")->nullable();
            $table->text("father_job_address")->nullable();
            $table->string("father_job_telephone")->nullable();
            $table->string("father_mobile")->nullable();

            $table->tinyInteger('mother_type')->default(0);
            $table->string('mother_name');
            $table->string('mother_family_name');
            $table->string('mother_father_name');
            $table->string('mother_meli_code');
            $table->string("mother_ssn");
            $table->string("mother_serial_ssn");
            $table->string('mother_city_ssn');
            $table->timestamp('mother_birth_date');
            $table->string('mother_education');
            $table->tinyInteger("mother_job_type");
            $table->string("mother_job")->nullable();
            $table->text("mother_job_address")->nullable();
            $table->string("mother_job_telephone")->nullable();

            $table->string("home_phone");
            $table->string("mobile");
            $table->string("connection_phone")->nullable();
            $table->text("home_address");
            $table->string("home_post_code");

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
