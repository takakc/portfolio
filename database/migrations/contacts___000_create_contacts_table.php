<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('session')->comment('問い合わせ者のセッション');
            $table->string('contents')->comment('内容');
            $table->integer('direction')->comment('送信方向');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE contacts COMMENT 'お問い合わせ'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
