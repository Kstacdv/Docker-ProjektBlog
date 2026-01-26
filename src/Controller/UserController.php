<?php
declare(strict_types=1);

namespace App\Controller;

use App\Formatter\ApiResponseFormatter;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class UserController extends AbstractController
{
    #[Route('api/users/show', name: 'app_user', methods: ['GET'])]
    public function showUser(ApiResponseFormatter $formatter): JsonResponse {
        $currentUser = $this->getUser();

        return $formatter->withData([
                'user_id' => $currentUser->getId(),
                'user_email' => $currentUser->getEmail(),
        ])->format();
    }

    #[Route("/users", name: 'app_user_password_change', methods: ['POST'])]
    #[IsGranted("ROLE_USER")]
    public function passwordChangeRequest(
        Request $request,
        UserRepository $userRepository,
        MailerInterface $mailer,
        UserPasswordHasherInterface $passwordHasher,
        ApiResponseFormatter $formatter,
        EntityManagerInterface $entityManager
        ): Response {
            $user = $this->getUser();
            if (!$user) {
                return $formatter->createErrorResponse('Unauthorized', 401);
            }

            $newPassword = $request->get('new_password');
            if (!$newPassword) {
                return $formatter->createErrorResponse('Brak nowego hasła', 400);
            }

            $token = bin2hex(random_bytes(32));
            $user->setPasswordChangeToken($token);
            $user->setTempPassword($passwordHasher->hashPassword($user, $newPassword));

            $entityManager->flush();

            $email = (new Email())
                ->from('admin@twojblog.pl')
                ->to($user->getEmail())
                ->subject('Potwierdzenie zmiany hasła')
                ->html($this->renderView('emails/password_confirm.html.twig', [
                    'token' => $token,
                    'user' => $user
                ]));

            $mailer->send($email);

            return $formatter->createSuccessResponse(['message' => 'E-mail z potwierdzeniem został wysłany.']);
    }
    #[Route("/users/password-confirm/{token}", name: 'app_user_password_confirm', methods: ['GET'])]
    #[IsGranted("ROLE_USER")]
    public function confirmPasswordChange(
        string $token,
        UserRepository $userRepository,
        EntityManagerInterface $entityManager
    ): Response {
        $user = $userRepository->findOneBy(['passwordChangeToken' => $token]);

        if (!$user) {
            return new Response('Nieprawidłowy lub wygasły token.', 400);
        }

        $user->setPassword($user->getTempPassword());

        $user->setPasswordChangeToken(null);
        $user->setTempPassword(null);

        $entityManager->flush();

        return $this->render('user/password_success.html.twig');
    }
}
