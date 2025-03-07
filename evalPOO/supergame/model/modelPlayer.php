<?php
//MODEL POUR LA TABLE JOUEURS
Class ModelPlayer{
    //ATTRIBUTE
    private ?int $id = null;
    private ?string $pseudo;
    
    private ?string $email = null;
    private ?int $score = null;
    private ?string $password = null;

    private ?PDO $bdd;
    
    //CONSTRUCT
    public function __construct() {
        $this->setBdd(connect());
    }
       
    //GETTER
    public function getId(): ?int{
        return $this->id;
    }

    public function getPseudo(): ?string{
        return $this->pseudo;
    }

    public function getEmail(): ?string{
        return $this->email;
    }

    public function getScore(): ?int{
        return $this->score;
    }

    public function getPassword(): ?string{
        return $this->password;
    }

    public function getBdd(): ?PDO{
        return $this->bdd;
    }



    //SETTER
    
    public function setId(int $newId): ModelPlayer{
        $this->id = $newId;
        return $this;
    }

    public function setPseudo(string $newPseudo): ModelPlayer{
        $this->nickname = $newPseudo;
        return $this;
    }

    public function setEmail(string $newEmail): ModelPlayer{
        $this->email = $newEmail;
        return $this;
    }

    public function setScore(int $newScore): ModelPlayer{
        $this->score = $newScore;
        return $this;
    }

    public function setPassword(string $newPassword): ModelPlayer{
        $this->password = $newPassword;
        return $this;
    }

    public function setBdd(PDO $bdd): ModelPlayer{
        $this->bdd = $bdd;
        return $this;
    }
    
}

?>