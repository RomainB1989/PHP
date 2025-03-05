<?php

Class ViewTask{

    //ATTRIBUTE
    private?string $message = "";
    private?string $taskList = "";

    private?string $categoryList = "";


    //CONSTRUCT

    //GETTER
    public function getMessage(): string{
        return $this->message;
    }

    public function getTaskList(): string{
        return $this->taskList;
    }

    public function getCategoryList(): string{
        return $this->categoryList;
    }

    //SETTER
    public function setMessage(string $newMessage):ViewTask {
        $this->message = $newMessage;
        return $this;
    }

    public function setTaskList(string $newTaskList):ViewTask{
        $this->usersList = $newTaskList;
        return $this;
    }

    public function setCategoryList(string $newCategoryList):ViewTask{
        $this->categoryList = $newCategoryList;
        return $this;
    }

    //METHODS
    public function displayView(): string{
        return
        '
            <main>
                <div style="display:flex; flex-direction:column; align-items: center;">
                    <form action="" method="post" style="border: solid 3px black; width: 20%; margin: 0 auto; padding: 10px 10px; margin: 10px 10px; display:flex; flex-direction:column;">
                        <h2 style="text-align:center;">Créer une nouvelle Tache !</h2>
                        <label for="name_task">Nom de la tâche:</label>
                        <input type="text" id="name_task" name="name_task" required maxlength="50" placeholder="Ex: Réunion client">
                        <label for="content_task">Description:</label>
                        <textarea id="content_task" name="content_task" required placeholder="Détaillez la tâche ici..."></textarea>
                        <label for="date_task">Date:</label>
                        <input type="date" id="date_task" name="date_task" required min="">
                        <label for="name_category">Catégorie:</label>
                        <select id="name_category" name="name_category" required>
                            <option value="" disabled selected>Sélectionnez une catégorie</option>
                            <!-- <option value="Test 1">Test 1</option> -->
                            <!-- Options à générer dynamiquement depuis la table categories -->
                            '.$this->getCategoryList().'

                        </select>
                        <input type="submit" value="Ajouter votre Tache" name="submit">
                    </form>
                </div>
                <p style="text-align:center;">'.$this->getMessage().'</p>
                <section>
                    <ul>
                        '.$this->getTaskList().'
                    </ul>
                </section>
            </main>
        ';
    }
}



?>