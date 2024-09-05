<?php namespace Ukatz\Quiz\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUkatzQuizQuestions8 extends Migration
{
    public function up()
    {
        Schema::table('ukatz_quiz_questions', function($table)
        {
            $table->dropColumn('repeater');
        });
    }
    
    public function down()
    {
        Schema::table('ukatz_quiz_questions', function($table)
        {
            $table->text('repeater')->nullable();
        });
    }
}
