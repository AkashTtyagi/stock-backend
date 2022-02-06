<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitionItemInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisition_item_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('requisition_id')->nullable();
            $table->string('module', 255)->nullable();
            $table->string('sub_module', 255)->nullable();
            $table->string('key', 255)->nullable();
            $table->string('value', 255)->nullable();
            //Default Mandatory Metadata fields
            $table->softDeletes();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
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
        Schema::dropIfExists('requisition_item_infos');
    }
}
