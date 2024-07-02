<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240701090345 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, inside TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE furniture (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, status_id INT NOT NULL, name VARCHAR(255) NOT NULL, height DOUBLE PRECISION NOT NULL, width DOUBLE PRECISION NOT NULL, depth DOUBLE PRECISION NOT NULL, price DOUBLE PRECISION NOT NULL, color VARCHAR(255) DEFAULT NULL, picture VARCHAR(255) NOT NULL, material VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_665DDAB312469DE2 (category_id), INDEX IDX_665DDAB36BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE furniture ADD CONSTRAINT FK_665DDAB312469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE furniture ADD CONSTRAINT FK_665DDAB36BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE furniture DROP FOREIGN KEY FK_665DDAB312469DE2');
        $this->addSql('ALTER TABLE furniture DROP FOREIGN KEY FK_665DDAB36BF700BD');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE furniture');
        $this->addSql('DROP TABLE status');
    }
}
