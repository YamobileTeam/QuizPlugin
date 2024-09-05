<?php namespace Ukatz\Quiz\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUkatzQuizRequests6 extends Migration
{
    public function up()
    {
        Schema::table('ukatz_quiz_requests', function($table)
        {
            $table->smallInteger('repeater_email')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ukatz_quiz_requests', function($table)
        {
            $table->dropColumn('repeater_email');
        });
    }
}
