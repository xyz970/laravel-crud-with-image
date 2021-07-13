<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StudentsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students',function(Blueprint $tb){
            $tb->id();
            $tb->string('nisn');
            $tb->string('name');
            $tb->string('photo');
            $tb->string('email');
            $tb->date('dob')->comment('Tanggal Lahir');
            $tb->string('pob')->comment("Tempat Lahir");
            $tb->softDeletes();
            $tb->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
