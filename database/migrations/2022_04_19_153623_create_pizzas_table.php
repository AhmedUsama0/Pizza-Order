<?php
//migration used to structure the table and insert it in the database
//we use php artisan migrate to run the up function in each migration file to create the table in each migration file
//we use php artisan make:migration create_pizzas_table to create the pizzas table
//php artisan migrate:rollback delete all the  data inside the table
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
    //used to make the table
    public function up()
    {
        Schema::create('pizzas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('type');
            $table->string('base');
            $table->string('name');
            $table->json('toppings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    //used to drop the table
    public function down()
    {
        Schema::dropIfExists('pizzas');
    }
};
