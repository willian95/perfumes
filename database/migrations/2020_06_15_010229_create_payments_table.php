<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum("status", ["aprobado", "rechazado"]);
            $table->double("total_products", 14, 2);
            $table->double("shipping_cost", 14,2);
            $table->double("total", 14, 2);
            $table->string("order_id");
            $table->integer("user_id");
            $table->string("tracking");
            $table->text("address");
            $table->enum("status_shipping", ["En proceso", "Despachado", "Finalizado"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
