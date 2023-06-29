<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateGatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableNames = config('nova-permissions.table_names');

        Schema::create($tableNames['role_permission'], function (Blueprint $table) use ($tableNames) {
            $table->unsignedBigInteger('role_id');
            $table->string('name')->nullable();
            $table->string('permission_slug')->nullable();
            $table->timestamps();
            $table->foreign('role_id')
                  ->references('id')
                  ->on($tableNames['roles'])
                  ->onDelete('cascade');
            $table->primary(['role_id', 'name']);
        });

        Schema::create($tableNames['role_user'], function (Blueprint $table) use ($tableNames) {
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('role_id')
                  ->references('id')
                  ->on($tableNames['roles'])
                  ->onDelete('cascade');

            $table->foreign('user_id')
                  ->references('id')
                  ->on($tableNames['users'])
                  ->onDelete('cascade');
            $table->primary(['role_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tableNames = config('nova-permissions.table_names');

        Schema::dropIfExists($tableNames['role_permission']);
        Schema::dropIfExists($tableNames['role_user']);
        // Schema::dropIfExists($tableNames['roles']);
    }
}
