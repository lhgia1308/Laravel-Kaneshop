
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateAdminWalletHistoriesTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('admin_wallet_histories', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->bigInteger('admin_id')->nullable();
                    
                        $table->Float('amount')->nullable();
                    
                        $table->bigInteger('order_id')->nullable();
                    
                        $table->bigInteger('product_id')->nullable();
                    
                        $table->string('payment', 190)->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('admin_wallet_histories');
                        }
                    }
                