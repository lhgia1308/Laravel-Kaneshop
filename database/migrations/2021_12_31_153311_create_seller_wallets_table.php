
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateSellerWalletsTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('seller_wallets', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->bigInteger('seller_id')->nullable();
                    
                        $table->Float('balance')->nullable();
                    
                        $table->Float('withdrawn')->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('seller_wallets');
                        }
                    }
                