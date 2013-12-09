<?php

use Illuminate\Database\Migrations\Migration;

class PivotTeamUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('team_user', function($table) {
			$table->increments('id');
			$table->integer('team_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->boolean('is_team_admin')->default(false);
			$table->timestamps();

			$table->foreign('team_id')
				  ->references('id')->on('teams')
				  ->onUpdate('cascade')
				  ->onDelete('cascade');
			$table->foreign('user_id')
				  ->references('id')->on('users')
				  ->onUpdate('cascade')
				  ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('team_user');
	}

}