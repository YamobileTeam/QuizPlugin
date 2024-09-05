<?php namespace Ukatz\Quiz\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUkatzQuizCategory2 extends Migration
{
    public function up()
    {
        Schema::table('ukatz_quiz_category', function($table)
        {
            $table->dropPrimary(['id']);
            $table->integer('question_id')->unsigned();
            $table->primary(['id','question_id']);
        });
    }
    
    public function down()
    {
        Schema::table('ukatz_quiz_category', function($table)
        {
            $table->dropPrimary(['id','question_id']);
            $table->dropColumn('question_id');
            $table->primary(['id']);
        });
    }
}
