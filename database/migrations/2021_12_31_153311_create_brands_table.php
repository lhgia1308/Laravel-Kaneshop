
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateBrandsTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('brands', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->string('name', 50)->nullable();
                    
                        $table->string('image', 50)->nullable();
                    
                        $table->smallInteger('status')->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('brands');
                        }
                    }
                