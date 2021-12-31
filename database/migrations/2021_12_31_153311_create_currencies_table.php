
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateCurrenciesTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('currencies', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->string('name', 191)->nullable();
                    
                        $table->string('symbol', 191)->nullable();
                    
                        $table->string('code', 191)->nullable();
                    
                        $table->string('exchange_rate', 191)->nullable();
                    
                        $table->smallInteger('status')->nullable();
                    
                        $table->string('position', 10)->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('currencies');
                        }
                    }
                