<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201006152212 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, description VARCHAR(255) DEFAULT NULL, color VARCHAR(7) NOT NULL, icon VARCHAR(120) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE help (id INT AUTO_INCREMENT NOT NULL, question VARCHAR(255) NOT NULL, answer LONGTEXT NOT NULL, read_counter INT DEFAULT NULL, positive_rate INT NOT NULL, negative_rate INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(80) NOT NULL, lastname VARCHAR(80) NOT NULL, email VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, sended_at DATETIME NOT NULL, read_at DATETIME DEFAULT NULL, is_read TINYINT(1) NOT NULL, ip_address VARCHAR(32) NOT NULL, user_agent VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE support_feedback (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(40) NOT NULL, lastname VARCHAR(40) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(40) DEFAULT NULL, type enum(\'comments\', \'questions\', \'bugreports\', \'suggests\'), content LONGTEXT NOT NULL, rate VARCHAR(255) NOT NULL, user_agent VARCHAR(255) NOT NULL, ip_address VARCHAR(36) NOT NULL, created_at DATETIME NOT NULL, read_at DATETIME DEFAULT NULL, is_read TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE terms (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(120) NOT NULL, slug VARCHAR(120) NOT NULL, content LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE help');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE support_feedback');
        $this->addSql('DROP TABLE terms');
    }
}
