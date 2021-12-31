
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateProductStocksTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('product_stocks', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->bigInteger('product_id')->nullable();
                    
                        $table->string('variant', 255)->nullable();
                    
                        $table->string('sku', 255)->nullable();
                    
                        $table->Decimal('price')->nullable();
                    
                        $table->Integer('qty')->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('product_stocks');
                        }
                    }
                