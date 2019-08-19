<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToTasks extends Migration
{
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->integer('user_id');
        });
    }

    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $dropColumn('user_id');
        });
    }
}
