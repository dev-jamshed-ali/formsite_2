<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnLengthInTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_faq_items', function (Blueprint $table) {
            $table->longText('detail')->change();
        });

        Schema::table('page_about_items', function (Blueprint $table) {
            $table->longText('detail')->change();
        });

        Schema::table('page_blog_items', function (Blueprint $table) {
            $table->longText('detail')->change();
        });

        Schema::table('page_career_items', function (Blueprint $table) {
            $table->longText('detail')->change();
        });

        Schema::table('page_contact_items', function (Blueprint $table) {
            $table->longText('detail')->change();
        });

        Schema::table('page_faq_items', function (Blueprint $table) {
            $table->longText('detail')->change();
        });

        // Schema::table('page_home_items', function (Blueprint $table) {
        //     $table->longText('detail')->change();
        // });


        // Schema::table('page_other_items', function (Blueprint $table) {
        //     $table->longText('detail')->change();
        // });


        Schema::table('page_photo_gallery_items', function (Blueprint $table) {
            $table->longText('detail')->change();
        });

        Schema::table('page_privacy_items', function (Blueprint $table) {
            $table->longText('detail')->change();
        });

        Schema::table('page_project_items', function (Blueprint $table) {
            $table->longText('detail')->change();
        });

        Schema::table('page_service_items', function (Blueprint $table) {
            $table->longText('detail')->change();
        });

        Schema::table('page_shop_items', function (Blueprint $table) {
            $table->longText('detail')->change();
        });

        Schema::table('page_team_items', function (Blueprint $table) {
            $table->longText('detail')->change();
        });

        Schema::table('page_term_items', function (Blueprint $table) {
            $table->longText('detail')->change();
        });

        Schema::table('page_video_gallery_items', function (Blueprint $table) {
            $table->longText('detail')->change();
        });

        Schema::table('dynamic_pages', function (Blueprint $table) {
            $table->longText('dynamic_page_content')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_faq_items', function (Blueprint $table) {
            //
        });
    }
}
