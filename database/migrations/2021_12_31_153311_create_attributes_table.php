
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateAttributesTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('attributes', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->string('name', 100)->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('attributes');
                        }
                    }
                