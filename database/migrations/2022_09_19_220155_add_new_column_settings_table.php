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
        Schema::table('home_page_settings', function (Blueprint $table) {
            //
            $table->enum('privacy_status',[1,0])->after('privacy_policy')->default(0);
            $table->enum('terms_status',[1,'0'])->after('terms')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('home_page_settings', function (Blueprint $table) {
            //
            $table->enum('privacy_status',[1,0])->after('privacy_policy')->default(0);
            $table->enum('terms_status',[1,'0'])->after('terms')->default(0);
        });
    }
};
