<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('auctions', function (Blueprint $table): void {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamp('start_time')->default(now());
            // A day after the now timestamp
            $table->timestamp('end_time')->default(now()->addDay());
            $table->boolean('is_published')->default(false);
            // 'category'
            $table->string('category')->default('none');

            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auctions');
    }
};
