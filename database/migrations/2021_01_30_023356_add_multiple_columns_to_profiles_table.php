<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleColumnsToProfilesTable extends Migration
{
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->text('work')->nullable();
            $table->text('education')->nullable();
            $table->text('location')->nullable();
            $table->string('gender')->default('Secret');
            $table->string('relationship')->default('Single');
        });
    }

    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn('work');
            $table->dropColumn('education');
            $table->dropColumn('location');
            $table->dropColumn('gender');
            $table->dropColumn('relationship');
        });
    }
}
