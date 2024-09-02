<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_creation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $membre_depuis_le = null;

    #[ORM\Column(length: 255)]
    #[ORM\Column(length: 180)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $userName = null;

    #[ORM\Column(length: 255)]
    private ?string $userLastname = null;

    #[ORM\Column(length: 255)]
    private ?string $userAssoName = null;

    #[ORM\Column(length: 255)]
    private ?string $userTel = null;

    #[ORM\Column(length: 255)]
    private ?string $userAssoTel = null;

    #[ORM\Column(length: 255)]
    private ?string $userAdress = null;

    #[ORM\Column(length: 255)]
    private ?string $userAssoAdress = null;

    #[ORM\Column(length: 255)]
    private ?string $userAssoSport = null;

    #[ORM\Column(length: 255)]
    private ?string $userAssoDescr = null;
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $userDateCreation = null;
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }
    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): static
    {
        $this->userName = $userName;

        return $this;
    }

    public function getUserLastname(): ?string
    {
        return $this->userLastname;
    }

    public function setUserLastname(string $userLastname): static
    {
        $this->userLastname = $userLastname;

        return $this;
    }

    public function getUserAssoName(): ?string
    {
        return $this->userAssoName;
    }

    public function setUserAssoName(string $userAssoName): static
    {
        $this->userAssoName = $userAssoName;

        return $this;
    }

    public function getUserTel(): ?string
    {
        return $this->userTel;
    }

    public function setUserTel(string $userTel): static
    {
        $this->userTel = $userTel;

        return $this;
    }

    public function getUserAssoTel(): ?string
    {
        return $this->userAssoTel;
    }

    public function setUserAssoTel(string $userAssoTel): static
    {
        $this->userAssoTel = $userAssoTel;

        return $this;
    }

    public function getUserAdress(): ?string
    {
        return $this->userAdress;
    }

    public function setUserAdress(string $userAdress): static
    {
        $this->userAdress = $userAdress;

        return $this;
    }
    public function getUserDateCreation(): ?\DateTimeInterface
    {
        return $this->userDateCreation;
    }

    public function setUserDateCreation(\DateTimeInterface $userDateCreation)
    {
        $this->userDateCreation = $userDateCreation;
    }
    public function getUserAssoAdress(): ?string
    {
        return $this->userAssoAdress;
    }

    public function setUserAssoAdress(string $userAssoAdress): static
    {
        $this->userAssoAdress = $userAssoAdress;

        return $this;
    }
    public function getUserAssoSport(): ?string
    {
        return $this->userAssoSport;
    }

    public function setUserAssoSport(string $userAssoSport): static
    {
        $this->userAssoSport = $userAssoSport;
        return $this;
    }
    public function getUserAssoDescr(): ?string
    {
        return $this->userAssoDescr;
    }

    public function setUserAssoDescr(string $userAssoDescr): static
    {
        $this->userAssoDescr = $userAssoDescr;
        return $this;
    }
}