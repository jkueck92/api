<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->id();

            $table->timestamps();

            $table->date('operation_date')
                ->nullable(false);

            $table->time('operation_time')
                ->nullable(false);

            $table->string('keyword')
                ->nullable(false);

            $table->string('keyword_description')
                ->nullable(false);

            $table->string('address')
                ->nullable(false);

            $table->string('address_addition');

            $table->text('message')
                ->nullable(false);

            $table->text('comment');

            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operations');
    }
}
