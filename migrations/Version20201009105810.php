<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201009105810 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE support_feedback CHANGE type type enum(\'comments\', \'questions\', \'bugreports\', \'suggests\')');
        $this->addSql('ALTER TABLE user ADD notes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649FC56F556 FOREIGN KEY (notes_id) REFERENCES note (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649FC56F556 ON user (notes_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE support_feedback CHANGE type type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649FC56F556');
        $this->addSql('DROP INDEX IDX_8D93D649FC56F556 ON user');
        $this->addSql('ALTER TABLE user DROP notes_id');
    }
}
