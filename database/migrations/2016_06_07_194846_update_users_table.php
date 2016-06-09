<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table){
            $table->string('profile_banner_url');
            $table->string('profile_image_url');
            $table->string('age');
            $table->text('about_me');
            $table->string('contacts');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table){
            $table->dropColumn('profile_banner_url');
            $table->dropColumn('profile_image_url');
            $table->dropColumn('age');
            $table->dropColumn('about_me');
            $table->dropColumn('contacts');
        });
    }
}
