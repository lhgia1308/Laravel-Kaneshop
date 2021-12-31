
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateOrderDetailsTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('order_details', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->bigInteger('order_id')->nullable();
                    
                        $table->bigInteger('product_id')->nullable();
                    
                        $table->bigInteger('seller_id')->nullable();
                    
                        $table->text('product_details')->nullable();
                    
                        $table->Integer('qty')->nullable();
                    
                        $table->Float('price')->nullable();
                    
                        $table->Float('tax')->nullable();
                    
                        $table->Float('discount')->nullable();
                    
                        $table->string('delivery_status', 15)->nullable();
                    
                        $table->string('payment_status', 15)->nullable();
                    
                        $table->bigInteger('shipping_method_id')->nullable();
                    
                        $table->string('variant', 255)->nullable();
                    
                        $table->string('variation', 255)->nullable();
                    
                        $table->string('discount_type', 30)->nullable();
                    
                        $table->smallInteger('is_stock_decreased')->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('order_details');
                        }
                    }
                