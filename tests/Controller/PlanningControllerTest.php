<?php

namespace App\Tests\Controller;

use App\Entity\Planning;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class PlanningControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;

    /** @var EntityRepository<Planning> */
    private EntityRepository $planningRepository;
    private string $path = '/planning/back/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->planningRepository = $this->manager->getRepository(Planning::class);

        foreach ($this->planningRepository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $this->client->followRedirects();
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Planning index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first()->text());
    }

    public function testNew(): void
    {
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'planning[jour]' => 'Testing',
            'planning[heureDebut]' => 'Testing',
            'planning[heureFin]' => 'Testing',
            'planning[pauseDebut]' => 'Testing',
            'planning[pauseFin]' => 'Testing',
            'planning[duree]' => 'Testing',
            'planning[psychologue]' => 'Testing',
        ]);

        self::assertResponseRedirects('/planning/back');

        self::assertSame(1, $this->planningRepository->count([]));

        $this->markTestIncomplete('This test was generated');
    }

    public function testShow(): void
    {
        $fixture = new Planning();
        $fixture->setJour('My Title');
        $fixture->setHeureDebut('My Title');
        $fixture->setHeureFin('My Title');
        $fixture->setPauseDebut('My Title');
        $fixture->setPauseFin('My Title');
        $fixture->setDuree('My Title');
        $fixture->setPsychologue('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Planning');

        // Use assertions to check that the properties are properly displayed.
        $this->markTestIncomplete('This test was generated');
    }

    public function testEdit(): void
    {
        $fixture = new Planning();
        $fixture->setJour('Value');
        $fixture->setHeureDebut('Value');
        $fixture->setHeureFin('Value');
        $fixture->setPauseDebut('Value');
        $fixture->setPauseFin('Value');
        $fixture->setDuree('Value');
        $fixture->setPsychologue('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'planning[jour]' => 'Something New',
            'planning[heureDebut]' => 'Something New',
            'planning[heureFin]' => 'Something New',
            'planning[pauseDebut]' => 'Something New',
            'planning[pauseFin]' => 'Something New',
            'planning[duree]' => 'Something New',
            'planning[psychologue]' => 'Something New',
        ]);

        self::assertResponseRedirects('/planning/back');

        $fixture = $this->planningRepository->findAll();

        self::assertSame('Something New', $fixture[0]->getJour());
        self::assertSame('Something New', $fixture[0]->getHeureDebut());
        self::assertSame('Something New', $fixture[0]->getHeureFin());
        self::assertSame('Something New', $fixture[0]->getPauseDebut());
        self::assertSame('Something New', $fixture[0]->getPauseFin());
        self::assertSame('Something New', $fixture[0]->getDuree());
        self::assertSame('Something New', $fixture[0]->getPsychologue());

        $this->markTestIncomplete('This test was generated');
    }

    public function testRemove(): void
    {
        $fixture = new Planning();
        $fixture->setJour('Value');
        $fixture->setHeureDebut('Value');
        $fixture->setHeureFin('Value');
        $fixture->setPauseDebut('Value');
        $fixture->setPauseFin('Value');
        $fixture->setDuree('Value');
        $fixture->setPsychologue('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/planning/back');
        self::assertSame(0, $this->planningRepository->count([]));

        $this->markTestIncomplete('This test was generated');
    }
}
