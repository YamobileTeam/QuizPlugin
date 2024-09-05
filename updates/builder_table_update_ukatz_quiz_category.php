<?php namespace Ukatz\Quiz\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUkatzQuizCategory extends Migration
{
    public function up()
    {
        Schema::table('ukatz_quiz_category', function($table)
        {
            $table->integer('id')->change();
        });
    }
    
    public function down()
    {
        Schema::table('ukatz_quiz_category', function($table)
        {
            $table->increments('id')->change();
        });
    }
}
