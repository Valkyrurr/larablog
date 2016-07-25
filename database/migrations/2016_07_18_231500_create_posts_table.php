<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("posts", function(Blueprint $table) {
            $table->increments("id");
            $table->string("title");
            $table->text("description");
            $table->text("body");
            $table->string("author");
            $table->timestamps();
        });

        Schema::table("posts", function(Blueprint $table) {
            $table->string("slug")->unique()->after("id");
            $table->timestamp("published_at")->index();
            $table->dropColumn("description");
            $table->dropColumn("author");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("posts");
    }
}
