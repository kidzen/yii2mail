<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'role_id' => $this->integer(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull(),

            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            ], $tableOptions);

        $this->createTable('{{%role}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->string(),

            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            ], $tableOptions);

        $this->createTable('{{%profile}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'name' => $this->string(),
            'rank' => $this->string(),
            'department' => $this->string(),

            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            ], $tableOptions);


        $this->insert('{{%role}}', [
            'id' => 1,
            'name' => 'Administrator',
            'description' => 'This role can control all.',

            'status' => 1,
            'created_at' => time(),
            'updated_at' => time(),
            ]);

        $this->insert('{{%role}}', [
            'id' => 2,
            'name' => 'User',
            'description' => 'This role have some restriction.',

            'status' => 1,
            'created_at' => time(),
            'updated_at' => time(),
            ]);

        $this->insert('{{%user}}', [
            'id' => 1,
            'username' => 'admin',
            'role_id' => 1,
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('password'),
            'email' => 'kidzenfxc@gmail.com',

            'status' => 1,
            'created_at' => time(),
            'updated_at' => time(),
            ]);

        $this->insert('{{%profile}}', [
            'id' => 1,
            'user_id' => 1,
            'name' => 'officer1',
            'rank' => 'Liutenant',
            'department' => 'Batery 1',

            'status' => 1,
            'created_at' => time(),
            'updated_at' => time(),
            ]);
        $this->insert('{{%user}}', [
            'id' => 2,
            'username' => 'user2',
            'role_id' => 1,
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('password'),
            'email' => 'kidzenfxc@gmail.com',

            'status' => 1,
            'created_at' => time(),
            'updated_at' => time(),
            ]);

        $this->insert('{{%profile}}', [
            'id' => 2,
            'user_id' => 2,
            'name' => 'officer2',
            'rank' => 'Liutenant',
            'department' => 'Batery 1',

            'status' => 1,
            'created_at' => time(),
            'updated_at' => time(),
            ]);

        $this->addForeignKey('fk_profile_user_id','{{profile}}','user_id','{{user}}','id');
        $this->addForeignKey('fk_user_role_id','{{user}}','role_id','{{role}}','id');

    }

    public function down()
    {
        $this->dropForeignKey('fk_profile_user_id','{{profile}}');
        $this->dropForeignKey('fk_user_role_id','{{user}}');
        $this->dropTable('{{%user}}');
        $this->dropTable('{{%role}}');
        $this->dropTable('{{%profile}}');
    }
}
