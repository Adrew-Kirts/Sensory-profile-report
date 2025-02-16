<?php

namespace App\Command;

use App\Entity\User;
use App\Entity\RegistrationCode;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:create-admin',
    description: 'Creates the first admin user'
)]
class CreateAdminCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private UserPasswordHasherInterface $passwordHasher
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        // Check if admin already exists
        $existingAdmin = $this->entityManager->getRepository(User::class)
            ->findOneBy(['roles' => ['ROLE_ADMIN']]);

        if ($existingAdmin) {
            $io->error('An admin user already exists!');
            return Command::FAILURE;
        }

        // Create registration code for admin
        $registrationCode = new RegistrationCode();
        $registrationCode->setCode('ADMIN_' . uniqid());
        $registrationCode->setIsUsed(true);

        // Create admin user
        $admin = new User();
        $admin->setUsername($io->ask('Username', 'admin'));
        $admin->setEmail($io->ask('Email'));
        $admin->setFirstName($io->ask('First Name'));
        $admin->setLastName($io->ask('Last Name'));
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setRegistrationCode($registrationCode);
        $admin->setSlug(strtolower($admin->getFirstName()));
        $admin->setCreatedAt(new \DateTimeImmutable());

        // Set password with confirmation
        $password = null;
        while ($password === null) {
            $password = $io->askHidden('Password');
            $confirm = $io->askHidden('Confirm Password');

            if ($password !== $confirm) {
                $io->error('Passwords do not match!');
                $password = null;
            }
        }

        $hashedPassword = $this->passwordHasher->hashPassword($admin, $password);
        $admin->setPassword($hashedPassword);

        // Save to database
        $this->entityManager->persist($registrationCode);
        $this->entityManager->persist($admin);
        $this->entityManager->flush();

        $io->success('Admin user created successfully!');

        return Command::SUCCESS;
    }
}