<?php

namespace App\Tests\Controller;

use App\Entity\Reservation;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ReservationControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;

    /** @var EntityRepository<Reservation> */
    private EntityRepository $reservationRepository;
    private string $path = '/reservation/front/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->reservationRepository = $this->manager->getRepository(Reservation::class);

        foreach ($this->reservationRepository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $this->client->followRedirects();
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Reservation index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first()->text());
    }

    public function testNew(): void
    {
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'reservation[idPatient]' => 'Testing',
            'reservation[idPsychologue]' => 'Testing',
            'reservation[datePrevue]' => 'Testing',
            'reservation[dateDispo]' => 'Testing',
            'reservation[status]' => 'Testing',
        ]);

        self::assertResponseRedirects('/reservation/front');

        self::assertSame(1, $this->reservationRepository->count([]));

        $this->markTestIncomplete('This test was generated');
    }

    public function testShow(): void
    {
        $fixture = new Reservation();
        $fixture->setIdPatient('My Title');
        $fixture->setIdPsychologue('My Title');
        $fixture->setDatePrevue('My Title');
        $fixture->setDateDispo('My Title');
        $fixture->setStatus('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Reservation');

        // Use assertions to check that the properties are properly displayed.
        $this->markTestIncomplete('This test was generated');
    }

    public function testEdit(): void
    {
        $fixture = new Reservation();
        $fixture->setIdPatient('Value');
        $fixture->setIdPsychologue('Value');
        $fixture->setDatePrevue('Value');
        $fixture->setDateDispo('Value');
        $fixture->setStatus('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'reservation[idPatient]' => 'Something New',
            'reservation[idPsychologue]' => 'Something New',
            'reservation[datePrevue]' => 'Something New',
            'reservation[dateDispo]' => 'Something New',
            'reservation[status]' => 'Something New',
        ]);

        self::assertResponseRedirects('/reservation/front');

        $fixture = $this->reservationRepository->findAll();

        self::assertSame('Something New', $fixture[0]->getIdPatient());
        self::assertSame('Something New', $fixture[0]->getIdPsychologue());
        self::assertSame('Something New', $fixture[0]->getDatePrevue());
        self::assertSame('Something New', $fixture[0]->getDateDispo());
        self::assertSame('Something New', $fixture[0]->getStatus());

        $this->markTestIncomplete('This test was generated');
    }

    public function testRemove(): void
    {
        $fixture = new Reservation();
        $fixture->setIdPatient('Value');
        $fixture->setIdPsychologue('Value');
        $fixture->setDatePrevue('Value');
        $fixture->setDateDispo('Value');
        $fixture->setStatus('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/reservation/front');
        self::assertSame(0, $this->reservationRepository->count([]));

        $this->markTestIncomplete('This test was generated');
    }
}
