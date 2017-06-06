<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVrPagesTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vr_pages_translations', function(Blueprint $table)
		{
			$table->foreign('language_id', 'fk_vr_page_translations_vr_languages1')->references('id')->on('vr_languages')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('page_id', 'fk_vr_page_translations_vr_pages1')->references('id')->on('vr_pages')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vr_pages_translations', function(Blueprint $table)
		{
			$table->dropForeign('fk_vr_page_translations_vr_languages1');
			$table->dropForeign('fk_vr_page_translations_vr_pages1');
		});
	}

}
