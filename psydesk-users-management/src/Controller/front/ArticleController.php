<?php

namespace App\Controller\front;
use App\Entity\User;
use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\LikeRepository;
use App\Entity\Commentaire;
use App\Entity\Like;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
 use Symfony\Contracts\HttpClient\HttpClientInterface;

#[Route('/front/article', name: 'front_article_')]
class ArticleController extends AbstractController
{
    // 👁️ Afficher uniquement les articles validés
    #[Route('/', name: 'index')]
    public function index(ArticleRepository $repo): Response
    {
        $articles = $repo->createQueryBuilder('a')
            ->where('a.statut = :s')
            ->setParameter('s', 'valide')
            ->orderBy('a.date_post', 'DESC')
            ->getQuery()
            ->getResult();

        return $this->render('front/article/index.html.twig', [
            'articles' => $articles,
        ]);
    }
    #[Route('/comment/{id}', name: 'article_comment', methods: ['POST'])]
public function comment(Request $request, Article $article, EntityManagerInterface $em): Response
{
    $contenu = $request->request->get('contenu');

    if ($contenu) {
        $comment = new Commentaire();
        $comment->setContenu($contenu);
        $comment->setArticle($article);
        $comment->setUser($this->getUser());

        $em->persist($comment);
        $em->flush();
    }

    return $this->redirectToRoute('front_article_index');
}
    #[Route('/like/{id}', name: 'article_like')]
public function like(Article $article, EntityManagerInterface $em, LikeRepository $repo): Response
{
    $user = $this->getUser();

    $like = $repo->findOneByUserAndArticle($user, $article);

    if ($like) {
        $em->remove($like); // unlike
    } else {
        $like = new Like();
        $like->setArticle($article);
        $like->setUser($user);
        $em->persist($like);
    }

    $em->flush();

    return $this->redirectToRoute('front_article_index');
}

    // ➕ Ajouter un article (utilisateur connecté)
 

#[Route('/check-toxic', name: 'check_toxic', methods: ['POST'])]
public function checkToxic(Request $request, HttpClientInterface $client): Response
{
    $contenu = $request->request->get('text');

    $response = $client->request(
        'POST',
        'https://api.deepai.org/api/toxicity-detector',
        [
            'headers' => [
                'api-key' => 'TON_API_KEY'
            ],
            'body' => [
                'text' => $contenu
            ]
        ]
    );

    try {
        $data = $response->toArray();
    } catch (\Exception $e) {
        $data = null;
    }

    $isToxic = false;

    if ($data && isset($data['output'])) {
        if ($data['output'] === 'toxic') {
            $isToxic = true;
        }
    }

    // fallback local
    $badWords = ['idiot','stupid','hate','fuck','shit','bitch'];

    foreach ($badWords as $word) {
        if (stripos($contenu, $word) !== false) {
            $isToxic = true;
        }
    }

    return $this->json([
        'toxic' => $isToxic
    ]);
}
#[ORM\Column(length: 255, nullable: true)]
private ?string $meetLink = null;

public function getMeetLink(): ?string
{
    return $this->meetLink;
}

public function setMeetLink(?string $meetLink): self
{
    $this->meetLink = $meetLink;
    return $this;
}

#[Route('/new', name: 'new')]
public function new(Request $request, EntityManagerInterface $em, HttpClientInterface $client): Response
{
    $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

    $article = new Article();
    $form = $this->createForm(ArticleType::class, $article);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

        $contenu = $article->getContenu();

        // 🔥 APPEL IA (DeepAI)
        $response = $client->request(
            'POST',
            'https://api.deepai.org/api/toxicity-detector',
            [
                'headers' => [
                    'api-key' => 'TON_API_KEY'
                ],
                'body' => [
                    'text' => $contenu
                ]
            ]
        );

        // 🔥 éviter crash API
        try {
            $data = $response->toArray();
        } catch (\Exception $e) {
            $data = null;
        }

        // 🔥 détection
        $isToxic = false;

        // IA
        if ($data && isset($data['output'])) {
            if ($data['output'] === 'toxic') {
                $isToxic = true;
            }
        }

        // fallback local
       $badWords = ['idiot', 'stupid', 'hate', 'fuck', 'shit', 'bitch'];

        foreach ($badWords as $word) {
            if (stripos($contenu, $word) !== false) {
                $isToxic = true;
            }
        }

        // 🔥 STATUT
        if ($isToxic) {
            $article->setStatut('refuse');

            $this->addFlash(
                'warning',
                '⚠️ Votre article contient des mots inappropriés et a été refusé'
            );
        } else {
            $article->setStatut('valide'); // ou "en_attente"
        }

        // 🔗 USER
        if ($this->getUser()) {
            $article->setUser($this->getUser());
        }

        // 🖼️ IMAGE
        $imageFile = $form->get('imageFile')->getData();

        if ($imageFile) {
            $newFilename = uniqid().'.'.$imageFile->guessExtension();

            $imageFile->move(
                $this->getParameter('uploads_directory'),
                $newFilename
            );

            $article->setImage($newFilename);
        }

        // 💾 SAVE
        $em->persist($article);
        $em->flush();

        return $this->redirectToRoute('front_article_index');
    }

    return $this->renderForm('front/article/new.html.twig', [
        'form' => $form,
    ]);
}
}