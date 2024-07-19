<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class ContactDTO
{
    #[Assert\Length(min: 2, max: 40, minMessage: 'Le champ {{ label }} doit contenenir plus de caractére', maxMessage: 'Le champ {{ label }} doit contenenir moins de caractére')]
    private ?string $name = null;

    #[Assert\Length(min: 1, max: 40, minMessage: 'Le champ {{ label }} doit contenenir plus de caractére', maxMessage: 'Le champ {{ label }} doit contenenir moins de caractére')]
    private ?string $mail = null;

    #[Assert\NotBlank(message: "Le champ {{ label }} est necessaire")]
    private ?string $message = null;



    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): static
    {
        $this->message = $message;

        return $this;
    }


    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }
}
