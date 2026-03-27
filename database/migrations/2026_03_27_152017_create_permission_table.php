<?php

use App\Core\Migration;

return new class extends Migration {

    public function up()
    {
        $this->schema()->create('permissions', function ($table) {
            $table->id('permission_id');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        $this->schema()->dropIfExists('permissions');
    }
};
