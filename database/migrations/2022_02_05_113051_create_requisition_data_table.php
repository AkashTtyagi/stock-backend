<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitionDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisition_data', function (Blueprint $table) {
            $table->id();
            $table->string('requisition_for_stores', 255);
            $table->string('requisition_number', 255)->nullable();
            $table->timestamp('date')->nullable();
            $table->string('intentor', 255)->nullable();
            $table->string('consignee', 255)->nullable();
            $table->string('consignee_code', 255)->nullable();
            $table->string('materials_required_at', 255)->nullable();
            $table->string('depot', 255)->nullable();
            $table->string('description_one', 255)->nullable();
            $table->string('description_two', 255)->nullable();
            $table->string('nomenclature_number', 255)->nullable();
            $table->string('quantity_demanded_in_figs', 255)->nullable();
            $table->string('units', 255)->nullable();
            $table->string('quantity_demanded_in_words', 255)->nullable();
            $table->string('last_purchase_particulars', 255)->nullable();
            $table->float('rate', 50, 6)->nullable();
            $table->float('value', 50, 6)->nullable();
            $table->string('purpose', 255)->nullable();
            $table->string('quantity_in_stock', 255)->nullable();
            $table->string('total_quantity_outstanding_coverage', 255)->nullable();
            $table->string('total_quantity_outstanding_purchase', 255)->nullable();
            $table->string('proprietary_certificate', 255)->nullable();
            $table->string('reason_for_urgent_purchase', 255)->nullable();

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
        Schema::dropIfExists('requisition_data');
    }
}
