<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250215170925 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE registration_code (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, used_by_id INT DEFAULT NULL, code VARCHAR(255) NOT NULL, is_used TINYINT(1) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', used_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_B82B274477153098 (code), INDEX IDX_B82B2744B03A8386 (created_by_id), INDEX IDX_B82B27444C2B72A8 (used_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE registration_code ADD CONSTRAINT FK_B82B2744B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE registration_code ADD CONSTRAINT FK_B82B27444C2B72A8 FOREIGN KEY (used_by_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE registration_code DROP FOREIGN KEY FK_B82B2744B03A8386');
        $this->addSql('ALTER TABLE registration_code DROP FOREIGN KEY FK_B82B27444C2B72A8');
        $this->addSql('DROP TABLE registration_code');
    }
}
