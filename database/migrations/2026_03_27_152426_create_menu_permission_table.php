<?php

use App\Core\Migration;

return new class extends Migration {

    public function up()
    {
        $this->schema()->create('menu_permissions', function ($table) {
            $table->foreginId('menu_id');
            $table->foreginId('permission_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        $this->schema()->dropIfExists('menu_permissions');
    }
};
