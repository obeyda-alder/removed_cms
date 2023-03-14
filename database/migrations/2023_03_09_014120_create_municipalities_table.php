<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipalitiesTable extends Migration
{
    public $set_schema_table = 'municipalities';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('city_id');
            $table->string('name_en', 150)->default('');
            $table->string('name_ar', 250);
            $table->string('municipality_key', 100)->default('');
            $table->string('municipality_city', 10)->default('');
            $table->string('google_short_name', 100);
            $table->string('google_long_name', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->set_schema_table);
    }
}
