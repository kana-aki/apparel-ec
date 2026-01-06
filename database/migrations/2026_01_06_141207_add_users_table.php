<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone', 20)->nullable()->after('email');
            $table->string('postal_code', 10)->nullable()->after('phone');
            $table->string('address1')->nullable()->after('postal_code');
            $table->string('address2')->nullable()->after('address1');
            $table->boolean('notification_enabled')->default(true)->after('address2');
            $table->boolean('is_locked')->default(false)->after('notification_enabled');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'postal_code',
                'address1',
                'address2',
                'notification_enabled',
                'is_locked',
            ]);
        });
    }
};
