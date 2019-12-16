<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191216042530 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE clients (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, comments VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clients_clients_groups (clients_id INT NOT NULL, clients_groups_id INT NOT NULL, INDEX IDX_E4F8455EAB014612 (clients_id), INDEX IDX_E4F8455E5E79BC83 (clients_groups_id), PRIMARY KEY(clients_id, clients_groups_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clients_groups (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE clients_clients_groups ADD CONSTRAINT FK_E4F8455EAB014612 FOREIGN KEY (clients_id) REFERENCES clients (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE clients_clients_groups ADD CONSTRAINT FK_E4F8455E5E79BC83 FOREIGN KEY (clients_groups_id) REFERENCES clients_groups (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE clients_clients_groups DROP FOREIGN KEY FK_E4F8455EAB014612');
        $this->addSql('ALTER TABLE clients_clients_groups DROP FOREIGN KEY FK_E4F8455E5E79BC83');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE clients_clients_groups');
        $this->addSql('DROP TABLE clients_groups');
    }
}
