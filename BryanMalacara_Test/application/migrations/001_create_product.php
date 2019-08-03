<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_product extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id_prod' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'descripcion' => array(
                                'type' => 'TEXT',
                                'null' => TRUE,
                        ),
                ));
                $this->dbforge->add_key('id_prod', TRUE);
                $this->dbforge->create_table('productos');
        }

        public function down()
        {
                $this->dbforge->drop_table('productos');
        }
}