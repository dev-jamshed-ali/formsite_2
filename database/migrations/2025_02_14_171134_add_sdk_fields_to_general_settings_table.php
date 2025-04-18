<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('general_settings', function (Blueprint $table) {
            $table->text('sdk_for_merchant')->nullable()->after('eula_for_financial');
            $table->text('sdk_for_bank')->nullable()->after('sdk_for_merchant');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('general_settings', function (Blueprint $table) {
            $table->dropColumn('sdk_for_merchant');
            $table->dropColumn('sdk_for_bank');
        });
    }
};
