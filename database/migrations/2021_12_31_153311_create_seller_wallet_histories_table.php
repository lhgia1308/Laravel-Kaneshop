
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateSellerWalletHistoriesTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('seller_wallet_histories', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->bigInteger('seller_id')->nullable();
                    
                        $table->Float('amount')->nullable();
                    
                        $table->bigInteger('order_id')->nullable();
                    
                        $table->bigInteger('product_id')->nullable();
                    
                        $table->string('payment', 191)->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('seller_wallet_histories');
                        }
                    }
                