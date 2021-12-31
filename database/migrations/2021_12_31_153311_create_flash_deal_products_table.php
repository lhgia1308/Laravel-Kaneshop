
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateFlashDealProductsTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('flash_deal_products', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->bigInteger('flash_deal_id')->nullable();
                    
                        $table->bigInteger('product_id')->nullable();
                    
                        $table->Decimal('discount')->nullable();
                    
                        $table->string('discount_type', 20)->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('flash_deal_products');
                        }
                    }
                