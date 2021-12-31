
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateTranslationsTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('translations', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->string('translationable_type', 191)->nullable();
                    
                        $table->bigInteger('translationable_id')->nullable();
                    
                        $table->string('locale', 191)->nullable();
                    
                        $table->string('key', 191)->nullable();
                    
                        $table->text('value')->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('translations');
                        }
                    }
                