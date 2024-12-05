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
        Schema::table('users', function (Blueprint $table) {
            $table->decimal('bitcoin_balance', 16, 7)->default(0.0000000)->after('status');
            $table->decimal('ethereum_balance', 16, 7)->default(0.0000000)->after('bitcoin_balance');
            $table->decimal('binancecoin_balance', 16, 7)->default(0.0000000)->after('ethereum_balance');
            $table->decimal('tron_balance', 16, 7)->default(0.0000000)->after('binancecoin_balance');
            $table->decimal('tether_balance', 16, 7)->default(0.0000000)->after('tron_balance');
            $table->decimal('usd_coin_balance', 16, 7)->default(0.0000000)->after('tether_balance');
            $table->decimal('doge_balance', 16, 7)->default(0.0000000)->after('usd_coin_balance');
            $table->string('ip_address', 100)->collation('utf8mb4_general_ci')->after('doge_balance');
            $table->string('kyc', 100)->nullable()->collation('utf8mb4_general_ci')->after('ip_address');
            $table->string('passFront', 100)->nullable()->collation('utf8mb4_general_ci')->after('kyc');
            $table->string('passBack', 100)->nullable()->collation('utf8mb4_general_ci')->after('passFront');
            $table->dateTime('reset_token_expires', 6)->default(DB::raw('CURRENT_TIMESTAMP(6)'))->after('passBack');
            $table->string('kstatus', 11)->default('pending')->collation('utf8mb4_general_ci')->after('reset_token_expires');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'bitcoin_balance',
                'ethereum_balance',
                'binancecoin_balance',
                'tron_balance',
                'tether_balance',
                'usd_coin_balance',
                'doge_balance',
                'ip_address',
                'kyc',
                'passFront',
                'passBack',
                'reset_token_expires',
                'kstatus'
            ]);
        });
    }
};
