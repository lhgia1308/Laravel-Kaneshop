
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateFeatureDealsTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('feature_deals', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->string('url', 191)->nullable();
                    
                        $table->string('photo', 191)->nullable();
                    
                        $table->smallInteger('status')->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('feature_deals');
                        }
                    }
                