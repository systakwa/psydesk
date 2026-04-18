<?php

namespace App\Controller\front;

use App\Entity\Participation;
use App\Entity\Evenement;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;


#[Route('/front/participation')]
class ParticipationController extends AbstractController
{
    #[Route('/participer/{id}', name: 'participer_event')]
    public function participer(
        Evenement $evenement,
        EntityManagerInterface $em,
        MailerInterface $mailer
    ): Response
    {
        $user = $this->getUser();

        // 🔒 vérifier si déjà inscrit
        $existing = $em->getRepository(Participation::class)->findOneBy([
            'user' => $user,
            'evenement' => $evenement
        ]);

        if ($existing) {
            $this->addFlash('error', 'Déjà مشارك ❌');
            return $this->redirectToRoute('app_event_index');
        }

        // ✅ création participation
        $participation = new Participation();
        $participation->setUser($user);
        $participation->setEvenement($evenement);
// 🔥 Générer lien Meet si n'existe pas
if (!$evenement->getMeetLink()) {

    $code = substr(md5(uniqid()), 0, 10);

    $meetLink = "https://meet.jit.si/" . $code;

    $evenement->setMeetLink($meetLink);

    $em->persist($evenement); // 🔥 important
}
        $em->persist($participation);
        $em->flush();
        $email = (new Email())
    ->from('noreply@Psydesk.com')
    ->to($user->getEmail())
    ->subject('Participation confirmée')
    ->html("
        <h2>Participation confirmée ✔️</h2>

        <p>🎥 Réunion :</p>

        <a href='{$evenement->getMeetLink()}'
        style='background:red;color:white;padding:10px 20px;text-decoration:none;border-radius:5px'>
        Rejoindre la réunion
        </a>
    ");

$mailer->send($email);

        // =========================
        // 🔥 GOOGLE MEET (lien simple)
        // =========================
        $meetLink = "https://meet.google.com/abc-defg-hij";

        // =========================
        // 🔥 GOOGLE CALENDAR
        // =========================
        $eventTitle = urlencode($evenement->getTitre());

        $start = $evenement->getDateEvent()->format('Ymd\THis');
        $end = $evenement->getDateEvent()->modify('+2 hours')->format('Ymd\THis');

        $calendarLink = "https://www.google.com/calendar/render?action=TEMPLATE"
            . "&text=$eventTitle"
            . "&dates={$start}/{$end}"
            . "&details=Rejoindre Meet: $meetLink"
            . "&location=" . urlencode($evenement->getLieu());

        // =========================
        // 🔥 EMAIL
        // =========================
        $email = (new Email())
            ->from('noreply@tonsite.com')
            ->to($user->getEmail())
            ->subject('Participation confirmée')
            ->html("
                <h2>Inscription réussie ✔️</h2>
                <p><strong>Événement :</strong> {$evenement->getTitre()}</p>

                <p>
                    📅 <a href='$calendarLink'>Ajouter au Google Calendar</a>
                </p>

                <p>
                    🎥 <a href='$meetLink'>Rejoindre la réunion Google Meet</a>
                </p>
            ");

        $mailer->send($email);

        // message succès
        $this->addFlash('success', 'Participation ajoutée + email envoyé ✅');

        return $this->redirectToRoute('app_event_index');
    }
}