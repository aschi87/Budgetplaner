<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Initial extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
        {
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->rememberToken();
			$table->timestamps();
		});

        Schema::create('password_resets', function(Blueprint $table)
        {
            $table->string('email')->index();
            $table->string('token')->index();
            $table->timestamp('created_at');
        });

        Schema::create('budgets', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('budget_user', function(Blueprint $table)
        {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('budget_id')->unsigned();
            $table->foreign('budget_id')->references('id')->on('budgets');
        });

        Schema::create('categories', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->decimal('limit');
            $table->timestamps();

            $table->integer('budget_id')->unsigned();
            $table->foreign('budget_id')->references('id')->on('budgets');
        });

        Schema::create('entries', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->decimal('amount');
            $table->date('date');
            $table->timestamps();

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('entries');
        Schema::drop('categories');
        Schema::drop('budget_user');
        Schema::drop('budgets');
        Schema::drop('password_resets');
        Schema::drop('users');
	}

}
