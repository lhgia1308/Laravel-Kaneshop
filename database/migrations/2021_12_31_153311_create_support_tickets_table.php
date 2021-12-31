
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateSupportTicketsTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('support_tickets', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->bigInteger('customer_id')->nullable();
                    
                        $table->string('subject', 150)->nullable();
                    
                        $table->string('type', 50)->nullable();
                    
                        $table->string('priority', 15)->nullable();
                    
                        $table->string('description', 255)->nullable();
                    
                        $table->string('reply', 255)->nullable();
                    
                        $table->string('status', 15)->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('support_tickets');
                        }
                    }
                