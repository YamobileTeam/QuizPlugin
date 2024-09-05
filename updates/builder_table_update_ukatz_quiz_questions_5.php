<?php namespace Ukatz\Quiz\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUkatzQuizQuestions5 extends Migration
{
    public function up()
    {
        Schema::table('ukatz_quiz_questions', function($table)
        {
            $table->renameColumn('relation_id', 'relation');
        });
    }
    
    public function down()
    {
        Schema::table('ukatz_quiz_questions', function($table)
        {
            $table->renameColumn('relation', 'relation_id');
        });
    }
}
