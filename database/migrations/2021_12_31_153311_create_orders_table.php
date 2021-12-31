
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateOrdersTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('orders', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->string('customer_id', 15)->nullable();
                    
                        $table->string('customer_type', 10)->nullable();
                    
                        $table->string('payment_status', 15)->nullable();
                    
                        $table->string('order_status', 15)->nullable();
                    
                        $table->string('payment_method', 30)->nullable();
                    
                        $table->string('transaction_ref', 30)->nullable();
                    
                        $table->Float('order_amount')->nullable();
                    
                        $table->text('shipping_address')->nullable();
                    
                        $table->Float('discount_amount')->nullable();
                    
                        $table->string('discount_type', 30)->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('orders');
                        }
                    }
                