<?php namespace Ukatz\Quiz\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUkatzQuizRequests5 extends Migration
{
    public function up()
    {
        Schema::table('ukatz_quiz_requests', function($table)
        {
            $table->string('email')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ukatz_quiz_requests', function($table)
        {
            $table->dropColumn('email');
        });
    }
}
