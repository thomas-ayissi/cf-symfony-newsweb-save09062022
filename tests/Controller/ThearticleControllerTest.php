<?php

namespace App\Test\Controller;

use App\Entity\Thearticle;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ThearticleControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/thearticle/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = (static::getContainer()->get('doctrine'))->getManager();
        $this->repository = $this->manager->getRepository(Thearticle::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Thearticle index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'thearticle[thearticletitle]' => 'Testing',
            'thearticle[thearticleslug]' => 'Testing',
            'thearticle[thearticleresume]' => 'Testing',
            'thearticle[thearticletext]' => 'Testing',
            'thearticle[thearticledate]' => 'Testing',
            'thearticle[thearticleactivate]' => 'Testing',
            'thearticle[theuserIdtheuser]' => 'Testing',
            'thearticle[thecommentIdthecomment]' => 'Testing',
            'thearticle[theimageIdtheimage]' => 'Testing',
            'thearticle[thesectionIdthesection]' => 'Testing',
        ]);

        self::assertResponseRedirects('/sweet/food/');

        self::assertSame(1, $this->getRepository()->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Thearticle();
        $fixture->setThearticletitle('My Title');
        $fixture->setThearticleslug('My Title');
        $fixture->setThearticleresume('My Title');
        $fixture->setThearticletext('My Title');
        $fixture->setThearticledate('My Title');
        $fixture->setThearticleactivate('My Title');
        $fixture->setTheuserIdtheuser('My Title');
        $fixture->setThecommentIdthecomment('My Title');
        $fixture->setTheimageIdtheimage('My Title');
        $fixture->setThesectionIdthesection('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Thearticle');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Thearticle();
        $fixture->setThearticletitle('Value');
        $fixture->setThearticleslug('Value');
        $fixture->setThearticleresume('Value');
        $fixture->setThearticletext('Value');
        $fixture->setThearticledate('Value');
        $fixture->setThearticleactivate('Value');
        $fixture->setTheuserIdtheuser('Value');
        $fixture->setThecommentIdthecomment('Value');
        $fixture->setTheimageIdtheimage('Value');
        $fixture->setThesectionIdthesection('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'thearticle[thearticletitle]' => 'Something New',
            'thearticle[thearticleslug]' => 'Something New',
            'thearticle[thearticleresume]' => 'Something New',
            'thearticle[thearticletext]' => 'Something New',
            'thearticle[thearticledate]' => 'Something New',
            'thearticle[thearticleactivate]' => 'Something New',
            'thearticle[theuserIdtheuser]' => 'Something New',
            'thearticle[thecommentIdthecomment]' => 'Something New',
            'thearticle[theimageIdtheimage]' => 'Something New',
            'thearticle[thesectionIdthesection]' => 'Something New',
        ]);

        self::assertResponseRedirects('/thearticle/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getThearticletitle());
        self::assertSame('Something New', $fixture[0]->getThearticleslug());
        self::assertSame('Something New', $fixture[0]->getThearticleresume());
        self::assertSame('Something New', $fixture[0]->getThearticletext());
        self::assertSame('Something New', $fixture[0]->getThearticledate());
        self::assertSame('Something New', $fixture[0]->getThearticleactivate());
        self::assertSame('Something New', $fixture[0]->getTheuserIdtheuser());
        self::assertSame('Something New', $fixture[0]->getThecommentIdthecomment());
        self::assertSame('Something New', $fixture[0]->getTheimageIdtheimage());
        self::assertSame('Something New', $fixture[0]->getThesectionIdthesection());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Thearticle();
        $fixture->setThearticletitle('Value');
        $fixture->setThearticleslug('Value');
        $fixture->setThearticleresume('Value');
        $fixture->setThearticletext('Value');
        $fixture->setThearticledate('Value');
        $fixture->setThearticleactivate('Value');
        $fixture->setTheuserIdtheuser('Value');
        $fixture->setThecommentIdthecomment('Value');
        $fixture->setTheimageIdtheimage('Value');
        $fixture->setThesectionIdthesection('Value');

        $$this->manager->remove($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/thearticle/');
        self::assertSame(0, $this->repository->count([]));
    }
}
