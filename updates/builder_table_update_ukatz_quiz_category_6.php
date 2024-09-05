<?php namespace Ukatz\Quiz\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUkatzQuizCategory6 extends Migration
{
    public function up()
    {
        Schema::table('ukatz_quiz_category', function($table)
        {
            $table->dropColumn('question_id');
        });
    }
    
    public function down()
    {
        Schema::table('ukatz_quiz_category', function($table)
        {
            $table->integer('question_id')->unsigned();
        });
    }
}
