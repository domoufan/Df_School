<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220531220953 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classe ADD rp_id INT DEFAULT NULL, ADD ac_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE classe ADD CONSTRAINT FK_8F87BF96B70FF80C FOREIGN KEY (rp_id) REFERENCES rp (id)');
        $this->addSql('ALTER TABLE classe ADD CONSTRAINT FK_8F87BF96D2E3ED2F FOREIGN KEY (ac_id) REFERENCES ac (id)');
        $this->addSql('CREATE INDEX IDX_8F87BF96B70FF80C ON classe (rp_id)');
        $this->addSql('CREATE INDEX IDX_8F87BF96D2E3ED2F ON classe (ac_id)');
        $this->addSql('ALTER TABLE demande ADD ac_id INT NOT NULL');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A5D2E3ED2F FOREIGN KEY (ac_id) REFERENCES ac (id)');
        $this->addSql('CREATE INDEX IDX_2694D7A5D2E3ED2F ON demande (ac_id)');
        $this->addSql('ALTER TABLE module ADD ac_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE module ADD CONSTRAINT FK_C242628D2E3ED2F FOREIGN KEY (ac_id) REFERENCES ac (id)');
        $this->addSql('CREATE INDEX IDX_C242628D2E3ED2F ON module (ac_id)');
        $this->addSql('ALTER TABLE professeur ADD rp_id INT DEFAULT NULL, ADD ac_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE professeur ADD CONSTRAINT FK_17A55299B70FF80C FOREIGN KEY (rp_id) REFERENCES rp (id)');
        $this->addSql('ALTER TABLE professeur ADD CONSTRAINT FK_17A55299D2E3ED2F FOREIGN KEY (ac_id) REFERENCES ac (id)');
        $this->addSql('CREATE INDEX IDX_17A55299B70FF80C ON professeur (rp_id)');
        $this->addSql('CREATE INDEX IDX_17A55299D2E3ED2F ON professeur (ac_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classe DROP FOREIGN KEY FK_8F87BF96B70FF80C');
        $this->addSql('ALTER TABLE classe DROP FOREIGN KEY FK_8F87BF96D2E3ED2F');
        $this->addSql('DROP INDEX IDX_8F87BF96B70FF80C ON classe');
        $this->addSql('DROP INDEX IDX_8F87BF96D2E3ED2F ON classe');
        $this->addSql('ALTER TABLE classe DROP rp_id, DROP ac_id');
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A5D2E3ED2F');
        $this->addSql('DROP INDEX IDX_2694D7A5D2E3ED2F ON demande');
        $this->addSql('ALTER TABLE demande DROP ac_id');
        $this->addSql('ALTER TABLE module DROP FOREIGN KEY FK_C242628D2E3ED2F');
        $this->addSql('DROP INDEX IDX_C242628D2E3ED2F ON module');
        $this->addSql('ALTER TABLE module DROP ac_id');
        $this->addSql('ALTER TABLE professeur DROP FOREIGN KEY FK_17A55299B70FF80C');
        $this->addSql('ALTER TABLE professeur DROP FOREIGN KEY FK_17A55299D2E3ED2F');
        $this->addSql('DROP INDEX IDX_17A55299B70FF80C ON professeur');
        $this->addSql('DROP INDEX IDX_17A55299D2E3ED2F ON professeur');
        $this->addSql('ALTER TABLE professeur DROP rp_id, DROP ac_id');
    }
}
