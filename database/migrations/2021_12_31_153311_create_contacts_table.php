
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateContactsTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('contacts', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->string('name', 191)->nullable();
                    
                        $table->string('email', 191)->nullable();
                    
                        $table->string('mobile_number', 191)->nullable();
                    
                        $table->string('subject', 191)->nullable();
                    
                        $table->text('message')->nullable();
                    
                        $table->smallInteger('seen')->nullable();
                    
                        $table->string('feedback', 191)->nullable();
                    
                        $table->text('reply')->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('contacts');
                        }
                    }
                