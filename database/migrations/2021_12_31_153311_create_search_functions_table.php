
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateSearchFunctionsTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('search_functions', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->string('key', 150)->nullable();
                    
                        $table->string('url', 250)->nullable();
                    
                        $table->string('visible_for', 191)->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('search_functions');
                        }
                    }
                