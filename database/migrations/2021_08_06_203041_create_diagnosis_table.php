<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateDiagnosisTable extends Migration
{
    public function up()
    {
        Schema::create('diagnosis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('testname');
            $table->integer('price')->default(0);
            $table->text('image')->default('public/style/uploads/nodata.png');
            $table->text('info')->default(0);
            $table->string('type')->default(0);	
            $table->tinyInteger('status')->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('NULL ON UPDATE CURRENT_TIMESTAMP'))->nullable();
        });
    }
    public function down()
    {
        Schema::dropIfExists('diagnosis');
    }
}
