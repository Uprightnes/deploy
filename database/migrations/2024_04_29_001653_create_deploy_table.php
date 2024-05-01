<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeployTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deploy', function (Blueprint $table) {
            $table->id();
            $table->integer('staffid');
            $table->string('surname');
            $table->string('othername');
            $table->string('gender');
            $table->string('currentrole');
            $table->string('previousfeeder');
            $table->string('currentregion');
            $table->string('currentdepartment');
            $table->string('newrole');
            $table->string('newfeeder');
            $table->string('newregion');
            $table->integer('unit');
            $table->string('newdepartment');
            $table->date('effectivedeploymentdate');
            $table->string('email')->unique();
            $table->string('currentreportingline');
            $table->string('currentregionalmisemail')->unique();
            $table->string('newreportinglinerole');
            $table->string('newreportinglineemail')->unique();
            $table->string('newregionalmisemail')->unique();
            $table->string('redeploymenttype');
            $table->string('relocationallowance');
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
        Schema::dropIfExists('deploy');
    }
}
