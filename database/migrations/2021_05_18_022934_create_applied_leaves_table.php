<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppliedLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applied_leaves', function (Blueprint $table) {
            $table->id();
            $table->integer('leave_id');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('reason');
            $table->string('reporting_o');
            $table->integer('user_id');
            $table->integer('department_id');
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('applied_leaves');
    }
}
