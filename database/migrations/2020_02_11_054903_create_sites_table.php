<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('name')->index();
            $table->string('git_path');
            $table->string('ssh_key_path')->nullable();
            $table->string('site_directory');
            $table->string('current_release_directory');
            $table->string('releases_directory');
            $table->string('persistent_directory')->nullable();
            $table->json('persistent_files')->nullable();
            $table->json('pre_activation_script')->nullable();
            $table->json('post_activation_script')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites');
    }
}
