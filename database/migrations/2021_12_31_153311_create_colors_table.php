
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateColorsTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('colors', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->string('name', 30)->nullable();
                    
                        $table->string('code', 10)->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('colors');
                        }
                    }
                