<?php

class m140806_091958_create_map_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('map', array(
            'id' => 'pk',
            'cam_id' => 'integer',
            'name' => 'varchar(150)',
            'balloonText' => 'varchar(255)',    //содержимое балуна (может содеражть html)
            'stylePlacemark' => 'varchar(255) default "islands#nightDotIcon" ', //стиль метки
            'lat' => 'varchar(255) NOT NULL',   //широта
            'lon' => 'varchar(255) NOT NULL'    //долгота
        ));
    }

	public function down()
	{
		$this->dropTable('map');
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