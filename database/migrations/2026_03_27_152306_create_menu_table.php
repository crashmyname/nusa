<?php

use App\Core\Migration;

return new class extends Migration {

    public function up()
    {
        $this->schema()->create('menus', function ($table) {
            $table->id('menu_id');
            $table->string('name');
            $table->string('route');
            $table->string('icon');
            $table->string('parent_id');
            $table->string('order');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        $this->schema()->dropIfExists('menus');
    }
};
