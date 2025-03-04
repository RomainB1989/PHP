<?php

    class ViewCategory{
        //ATRIBUTES
        private ?string $message;
        private ?string $categoryList;
        //CONSTRUCT

        //GETTER
        public function getMessage(): string{
            return $this->message;
        }
    
        public function getCategoryList(): string{
            return $this->categoryList;
        }


        //SETTER
        
        public function setMessage(string $newMessage):ViewCategory {
            $this->message = $newMessage;
            return $this;
        }
    
        public function setCategoryList(string $newCategoryList):ViewCategory{
            $this->categoryList = $newCategoryList;
            return $this;
        }

        //METHODS


        public function displayView():string{
            return 
            '
            <main>
                <div style="display:flex; flex-direction:column; align-items: center;">
                    <form action="" method="post" style="border: solid 3px black; width: 20%; margin: 0 auto; padding: 10px 10px; margin: 10px 10px; display:flex; flex-direction:column;">
                        <h2 style="text-align:center;">Créer une nouvelle Catégorie !</h2>
                        <label for="name_category">Nom de la Catégorie :</label>
                        <input type="text" id="name_category" name="name_category" required maxlength="50" placeholder="Ex: Ménage">
                        <br>
                        <input type="submit" value="Ajouter Une Catégorie" name="submit">
                    </form>
                </div>
                <p style="text-align:center;">'.$this->getMessage().'</p>
                <section>
                <ul>
                    '.$this->getCategoryList().'
                </ul>
            </section>
            </main>
            ';
        }
    }



?>