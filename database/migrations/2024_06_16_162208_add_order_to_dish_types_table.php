<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderToDishTypesTable extends Migration
{
    public function up()
    {
        Schema::table('dish_types', function (Blueprint $table) {
            $table->integer('order')->default(0);
        });
    }

    public function down()
    {
        Schema::table('dish_types', function (Blueprint $table) {
            $table->dropColumn('order');
        });
    }
}

