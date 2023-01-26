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
        Schema::table('comics', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('description');
            $table->string('thumb');
            $table->float('price', 5, 2);
            $table->string('series');
            $table->date('sale_date');
            $table->string('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comics', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('description');
            $table->string('thumb');
            $table->float('price', 5, 2);
            $table->string('series');
            $table->date('sale_date');
            $table->string('type');
        });
    }
};
