<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveImageToUsersTable extends Migration
{

    // todo L why do we need this migration??
    public function up()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('images');
        });
    }

    public function down()
    {
        Schema::table('users', function($table) {
            $table->integer('images');
        });
    }
}
