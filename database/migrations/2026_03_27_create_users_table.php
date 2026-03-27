<?php
use App\Core\Migration;

return new class extends Migration {

    public function up()
    {
        $this->schema()->create('users', function ($table) {
            $table->id('user_id');
            $table->foreignId('company_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        $this->schema()->dropIfExists('users');
    }
};