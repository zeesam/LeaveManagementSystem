<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_statuses', function (Blueprint $table) {
            $table->id();
            $table->integer('leave_id');
            $table->string('disapprove_reason')->nullable();
            $table->string('approver_name');
            $table->string('approver_designation');
            $table->string('applied_id');
            $table->integer('approval_status');
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
        Schema::dropIfExists('leave_statuses');
    }
}
