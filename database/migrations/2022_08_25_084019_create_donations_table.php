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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->integer('item_id');
            $table->integer('Inventory')->nullable();//寄付数量
            $table->dateTime('BestBefore')->nullable();//賞味期限
            $table->string('StorageLocation')->nullable();//在庫地
            $table->dateTime('InventoryDeadline')->nullable();//在庫期限
            $table->string('DeliveryDate')->nullable();//納期（出荷依頼してX日）
            $table->string('Packing')->nullable();//荷姿（パレット/バラ積み）
            $table->string('remarks')->nullable();//備考
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
        Schema::dropIfExists('donations');
    }
};
