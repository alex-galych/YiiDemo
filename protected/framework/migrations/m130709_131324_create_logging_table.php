<?php
/**
 * @author Olexandr Galych <galych@zfort.com>
 * @link http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license http://www.zfort.com/terms-of-use
 *
 */

/*
 * Migration for Creating Logging table
 * @author Olexandr Galych <galych@zfort.com>
 * @version $Id$
 */

class m130709_131324_create_logging_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('Logging', array(
            'id' => 'pk',
            'sessionId' => ' VARCHAR(50)',
            'visitTime' => ' TIMESTAMP',
            'url' => 'TEXT',
        ));
	}

	public function down()
	{
        $this->dropTable('Logging');
	}

    /*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
    */

}