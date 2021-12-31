
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateAdminWalletsTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('admin_wallets', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->smallInteger('admin_id')->nullable();
                    
                        $table->Float('balance')->nullable();
                    
                        $table->Float('withdrawn')->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('admin_wallets');
                        }
                    }
                