<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPageContentInWhyChooseItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('why_choose_items', function (Blueprint $table) {
            $table->longText('page_content')->nullable()->after('description');
            $table->text('slug')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('why_choose_items', function (Blueprint $table) {
            $table->dropColumn('page_content');
            $table->dropColumn('slug');
        });
    }
}
