
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateHelpTopicsTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('help_topics', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->text('question')->nullable();
                    
                        $table->text('answer')->nullable();
                    
                        $table->Integer('ranking')->nullable();
                    
                        $table->smallInteger('status')->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('help_topics');
                        }
                    }
                