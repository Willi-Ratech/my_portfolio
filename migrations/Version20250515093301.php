<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250515093301 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE equipment ADD category_id INT DEFAULT NULL, ADD mark_id INT DEFAULT NULL, ADD model_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE equipment ADD CONSTRAINT FK_D338D58312469DE2 FOREIGN KEY (category_id) REFERENCES category (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE equipment ADD CONSTRAINT FK_D338D5834290F12B FOREIGN KEY (mark_id) REFERENCES mark (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE equipment ADD CONSTRAINT FK_D338D5837975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D338D58312469DE2 ON equipment (category_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D338D5834290F12B ON equipment (mark_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D338D5837975B7E7 ON equipment (model_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE equipment DROP FOREIGN KEY FK_D338D58312469DE2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE equipment DROP FOREIGN KEY FK_D338D5834290F12B
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE equipment DROP FOREIGN KEY FK_D338D5837975B7E7
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_D338D58312469DE2 ON equipment
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_D338D5834290F12B ON equipment
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_D338D5837975B7E7 ON equipment
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE equipment DROP category_id, DROP mark_id, DROP model_id
        SQL);
    }
}
