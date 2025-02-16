<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250216120412 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE registration_code DROP INDEX IDX_B82B27444C2B72A8, ADD UNIQUE INDEX UNIQ_B82B27444C2B72A8 (used_by_id)');
        $this->addSql('ALTER TABLE registration_code DROP FOREIGN KEY FK_B82B2744B03A8386');
        $this->addSql('DROP INDEX IDX_B82B2744B03A8386 ON registration_code');
        $this->addSql('ALTER TABLE registration_code DROP created_by_id');
        $this->addSql('ALTER TABLE user ADD registration_code_id INT DEFAULT NULL, DROP registration_code');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64967ABABB1 FOREIGN KEY (registration_code_id) REFERENCES registration_code (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64967ABABB1 ON user (registration_code_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64967ABABB1');
        $this->addSql('DROP INDEX UNIQ_8D93D64967ABABB1 ON user');
        $this->addSql('ALTER TABLE user ADD registration_code VARCHAR(255) DEFAULT NULL, DROP registration_code_id');
        $this->addSql('ALTER TABLE registration_code DROP INDEX UNIQ_B82B27444C2B72A8, ADD INDEX IDX_B82B27444C2B72A8 (used_by_id)');
        $this->addSql('ALTER TABLE registration_code ADD created_by_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE registration_code ADD CONSTRAINT FK_B82B2744B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_B82B2744B03A8386 ON registration_code (created_by_id)');
    }
}
