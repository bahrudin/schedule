<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('author_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->longText('contents');
            $table->integer('sort_order')->nullable();
            $table->boolean('is_publish')->default(false)->nullable();
            $table->string('slug')->unique()->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')->on('blog_categories')
                ->onUpdate('cascade')
                ->onDelete('no action');

            $table->foreign('author_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
