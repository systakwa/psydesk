<?php

namespace App\Tests\Controller;

use App\Entity\Fiche;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class FicheControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;

    /** @var EntityRepository<Fiche> */
    private EntityRepository $ficheRepository;
    private string $path = '/fiche/back/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->ficheRepository = $this->manager->getRepository(Fiche::class);

        foreach ($this->ficheRepository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $this->client->followRedirects();
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Fiche index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first()->text());
    }

    public function testNew(): void
    {
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'fiche[idPatient]' => 'Testing',
            'fiche[idPsychologue]' => 'Testing',
            'fiche[idReservation]' => 'Testing',
            'fiche[texteFiche]' => 'Testing',
            'fiche[date]' => 'Testing',
        ]);

        self::assertResponseRedirects('/fiche/back');

        self::assertSame(1, $this->ficheRepository->count([]));

        $this->markTestIncomplete('This test was generated');
    }

    public function testShow(): void
    {
        $fixture = new Fiche();
        $fixture->setIdPatient('My Title');
        $fixture->setIdPsychologue('My Title');
        $fixture->setIdReservation('My Title');
        $fixture->setTexteFiche('My Title');
        $fixture->setDate('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Fiche');

        // Use assertions to check that the properties are properly displayed.
        $this->markTestIncomplete('This test was generated');
    }

    public function testEdit(): void
    {
        $fixture = new Fiche();
        $fixture->setIdPatient('Value');
        $fixture->setIdPsychologue('Value');
        $fixture->setIdReservation('Value');
        $fixture->setTexteFiche('Value');
        $fixture->setDate('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'fiche[idPatient]' => 'Something New',
            'fiche[idPsychologue]' => 'Something New',
            'fiche[idReservation]' => 'Something New',
            'fiche[texteFiche]' => 'Something New',
            'fiche[date]' => 'Something New',
        ]);

        self::assertResponseRedirects('/fiche/back');

        $fixture = $this->ficheRepository->findAll();

        self::assertSame('Something New', $fixture[0]->getIdPatient());
        self::assertSame('Something New', $fixture[0]->getIdPsychologue());
        self::assertSame('Something New', $fixture[0]->getIdReservation());
        self::assertSame('Something New', $fixture[0]->getTexteFiche());
        self::assertSame('Something New', $fixture[0]->getDate());

        $this->markTestIncomplete('This test was generated');
    }

    public function testRemove(): void
    {
        $fixture = new Fiche();
        $fixture->setIdPatient('Value');
        $fixture->setIdPsychologue('Value');
        $fixture->setIdReservation('Value');
        $fixture->setTexteFiche('Value');
        $fixture->setDate('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/fiche/back');
        self::assertSame(0, $this->ficheRepository->count([]));

        $this->markTestIncomplete('This test was generated');
    }
}
