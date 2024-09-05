<?php namespace Ukatz\Quiz\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUkatzQuizQuestions4 extends Migration
{
    public function up()
    {
        Schema::table('ukatz_quiz_questions', function($table)
        {
            $table->text('relation_id')->nullable()->unsigned(false)->default(null)->comment(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('ukatz_quiz_questions', function($table)
        {
            $table->integer('relation_id')->nullable(false)->unsigned()->default(null)->comment(null)->change();
        });
    }
}
