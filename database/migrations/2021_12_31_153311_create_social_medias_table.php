
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateSocialMediasTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('social_medias', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->string('name', 100)->nullable();
                    
                        $table->string('link', 100)->nullable();
                    
                        $table->string('icon', 100)->nullable();
                    
                        $table->Integer('active_status')->nullable();
                    
                        $table->smallInteger('status')->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('social_medias');
                        }
                    }
                