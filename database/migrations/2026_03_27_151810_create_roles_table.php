<?php

use App\Core\Migration;

return new class extends Migration {

    public function up()
    {
        $this->schema()->create('roles', function ($table) {
            $table->id('role_id');
            $table->foreginId('company_id');
            $table->string('name');
            $table->bool('is_super_admin');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        $this->schema()->dropIfExists('roles');
    }
};
