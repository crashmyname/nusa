<?php

use App\Core\Migration;

return new class extends Migration {

    public function up()
    {
        $this->schema()->create('role_users', function ($table) {
            $table->foreignId('user_id');
            $table->foreignId('role_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        $this->schema()->dropIfExists('role_users');
    }
};
