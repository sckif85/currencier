<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20210703142011 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE currency ADD updated TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('CREATE INDEX IDX_6956883FC69B96F7 ON currency (updated)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX IDX_6956883FC69B96F7');
        $this->addSql('ALTER TABLE currency DROP updated');
    }
}
