<?php

 

use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

 

class CreateCommentsTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('comments', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->text('content', 65535);

            $table->integer('blog_post_id')->index('post_id_foreign');

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

        Schema::dropIfExists('comments');

    }

}