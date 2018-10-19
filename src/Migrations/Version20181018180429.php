<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181018180429 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE test_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE question_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE option_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE test (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE question (id INT NOT NULL, title VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE question_test (question_id INT NOT NULL, test_id INT NOT NULL, PRIMARY KEY(question_id, test_id))');
        $this->addSql('CREATE INDEX IDX_869193E31E27F6BF ON question_test (question_id)');
        $this->addSql('CREATE INDEX IDX_869193E31E5D0459 ON question_test (test_id)');
        $this->addSql('CREATE TABLE option (id INT NOT NULL, question_id_id INT NOT NULL, text VARCHAR(255) NOT NULL, is_right BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5A8600B04FAF8F53 ON option (question_id_id)');
        $this->addSql('ALTER TABLE question_test ADD CONSTRAINT FK_869193E31E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE question_test ADD CONSTRAINT FK_869193E31E5D0459 FOREIGN KEY (test_id) REFERENCES test (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE option ADD CONSTRAINT FK_5A8600B04FAF8F53 FOREIGN KEY (question_id_id) REFERENCES question (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE question_test DROP CONSTRAINT FK_869193E31E5D0459');
        $this->addSql('ALTER TABLE question_test DROP CONSTRAINT FK_869193E31E27F6BF');
        $this->addSql('ALTER TABLE option DROP CONSTRAINT FK_5A8600B04FAF8F53');
        $this->addSql('DROP SEQUENCE test_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE question_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE option_id_seq CASCADE');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE question_test');
        $this->addSql('DROP TABLE option');
    }
}
