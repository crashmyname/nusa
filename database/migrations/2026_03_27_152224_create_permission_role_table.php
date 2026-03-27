<?php

use App\Core\Migration;

return new class extends Migration {

    public function up()
    {
        $this->schema()->create('permission_roles', function ($table) {
            $table->foreignId('role_id');
            $table->foreignId('permission_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        $this->schema()->dropIfExists('permission_roles');
    }
};
