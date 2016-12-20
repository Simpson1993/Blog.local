<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_banner_url')->nullable();
            $table->string('profile_image_url')->nullable();
            $table->string('age')->nullable();
            $table->text('about_me')->nullable();
            $table->string('contacts')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('profile_banner_url');
            $table->dropColumn('profile_image_url');
            $table->dropColumn('age');
            $table->dropColumn('about_me');
            $table->dropColumn('contacts');
        });
    }
}
