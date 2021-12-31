
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class CreateSupportTicketConvsTable extends Migration
                    {
                        public function up() {
                            
                    Schema::create('support_ticket_convs', function (Blueprint $table) {
                        
                        $table->integer("id")->primary();
                    
                        $table->bigInteger('support_ticket_id')->nullable();
                    
                        $table->bigInteger('admin_id')->nullable();
                    
                        $table->string('customer_message', 191)->nullable();
                    
                        $table->string('admin_message', 191)->nullable();
                    
                        $table->Integer('position')->nullable();
                    
                        $table->DateTime('created_at')->nullable();
                    
                        $table->DateTime('updated_at')->nullable();
                    
                    });
                
                        }

                        public function down() {
                            Schema::dropIfExists('support_ticket_convs');
                        }
                    }
                