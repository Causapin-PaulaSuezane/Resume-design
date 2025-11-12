<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('github')->nullable();
            $table->text('about_me')->nullable();
            $table->json('skills')->nullable();
            $table->json('education')->nullable();
            $table->string('profile_image')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'address',
                'github',
                'about_me',
                'skills',
                'education',
                'profile_image'
            ]);
        });
    }
};
