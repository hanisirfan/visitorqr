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
        Schema::table('visitors', function (Blueprint $table) {

            // Add new columns for check in/out
            $table->dateTime('check_in_datetime')->nullable()->after('visit_datetime');

            $table->unsignedBigInteger('check_in_verified_by')->nullable()->after('check_in_datetime');
            $table->foreign('check_in_verified_by')->references('id')->on('users')
            ->nullOnDelete();

            $table->dateTime('check_out_datetime')->nullable()->after('check_in_verified_by');

            $table->unsignedBigInteger('check_out_verified_by')->nullable()->after('check_out_datetime');
            $table->foreign('check_out_verified_by')->references('id')->on('users')
            ->nullOnDelete();

            // Replace added_by column to use bigInt with foreign key
            $table->unsignedBigInteger('added_by')->nullable()->after('visit_datetime');
            $table->foreign('added_by')->references('id')->on('users')
            ->nullOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visitors', function (Blueprint $table) {
            //
        });
    }
};
